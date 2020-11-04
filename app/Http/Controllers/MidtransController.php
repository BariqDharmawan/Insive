<?php

namespace App\Http\Controllers;

use App\User;
use Veritrans_Snap;
use App\Models\Cart;
use App\Models\Sheet;
use Veritrans_Config;
use App\Models\Product;
use App\Models\SubCart;
use App\Models\Shipping;
use App\Models\Fragrance;
use Veritrans_Notification;
use App\Mail\ReceiptPayment;
use Illuminate\Http\Request;
use App\Models\CustomProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MidtransController extends Controller
{
  protected $request;

  public function __construct(Request $request)
  {
    $this->request = $request;

    // Set midtrans configuration
    Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
    Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
    Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
    Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
  }

  public function index()
  {
    return redirect('/');
  }

  public function submitPayment(Request $request)
  {
    $cart = Cart::where([
      ['user_id', Auth::id()],
      ['type_cart', 'custom'],
      ['status', 'waiting']
    ])->first();

    $customer = Shipping::where('user_id', Auth::id())->where('cart_id', $cart->id)->first();
    $customer->status = 'active';
    $customer->save();
    // Buat transaksi ke midtrans kemudian save snap tokennya.
    $sub_cart = CustomProduct::select('custom_products.*', DB::raw('CASE WHEN sheets.id IS NULL THEN fragrances.fragrance_name ELSE sheets.sheet_name END as name'))
      ->leftJoin('sheets', 'sheets.id', '=', 'custom_products.sheet_id')
      ->leftJoin('fragrances', 'fragrances.id', '=', 'custom_products.fragrance_id')
      ->where('cart_id', $cart->id)->get();
    $items = [];
    // $price = ($cart->total_price / $cart->total_qty);
    foreach ($sub_cart as $key => $value) {
      $items[] = [
        'id' => $value->id,
        'price' => $value->price,
        'quantity' => $value->qty,
        'name' => $value->name
      ];
    }
    $items[] = [
      'id' => 0,
      'price' => $cart->shipping_cost,
      'quantity' => 1,
      'name' => 'Ongkos kirim JNE'
    ];
    $payload = [
      'transaction_details' => [
        'order_id'      => $cart->cart_code,
        'gross_amount'  => $cart->total_price + $cart->shipping_cost,
      ],
      'customer_details' => [
        'first_name'    => $customer->name,
        'email'         => $customer->email,
        'phone'         => $customer->phone,
        'shipping_address' => ['address' => $customer->address],
      ],
      'item_details' => $items
    ];
    $snapToken = Veritrans_Snap::getSnapToken($payload);
    $cart->snap_token = $snapToken;
    $cart->save();

    // Beri response snap token
    $this->response['snap_token'] = $snapToken;

    return response()->json($this->response);
  }

  public function submitPaymentCatalog(Request $request)
  {
    $cart = Cart::where([
      ['user_id', Auth::id()],
      ['type_cart', 'catalog'],
      ['status', 'waiting']
    ])->first();
    // dd($cart);
    $customer = Shipping::where('user_id', Auth::id())->where('cart_id', $cart->id)->first();
    $customer->status = 'active';
    $customer->save();

    // Buat transaksi ke midtrans kemudian save snap tokennya.
    $sub_cart = SubCart::where('cart_id', $cart->id)->get();
    $items = [];
    foreach ($sub_cart as $key => $value) {
      $items[] = [
        'id' => $value->id,
        'price' => $value->price,
        'quantity' => $value->qty,
        'name' => Product::find($value->product_id)->product_name
      ];
    }
    $items[] = [
      'id' => 0,
      'price' => $cart->shipping_cost,
      'quantity' => 1,
      'name' => 'Ongkos kirim JNE'
    ];
    $payload = [
      'transaction_details' => [
        'order_id'      => $cart->cart_code,
        'gross_amount'  => $cart->total_price,
      ],
      'customer_details' => [
        'first_name'    => $customer->name,
        'email'         => $customer->email,
        'phone'         => $customer->phone,
        'shipping_address' => ['address' => $customer->address],
      ],
      'item_details' => $items
    ];
    $snapToken = Veritrans_Snap::getSnapToken($payload);
    $cart->snap_token = $snapToken;
    $cart->save();

    // cetak apa yg dibeli customer
    // Mail::to($this->adminAccount->first()->email)->send(new ReceiptPayment($items));

    // Beri response snap token
    $this->response['snap_token'] = $snapToken;

    return response()->json($this->response);
    // return response()->json($payload);
  }

  public function notificationHandler(Request $request)
  {
    $notif = new Veritrans_Notification();
    DB::transaction(function () use ($notif) {

      $transaction = $notif->transaction_status;
      $type = $notif->payment_type;
      $orderId = $notif->order_id;
      $fraud = $notif->fraud_status;
      $donation = Cart::where('cart_code', $orderId)->first();

      $user = User::find($donation->user_id);
      $mail_data = [];
      $mail_data["user_name"] = $user->name;
      $mail_data["user_email"] = $user->email;
      $mail_data["user_cart_code"] = $donation->cart_code;

      if ($transaction == 'capture') {

        // For credit card transaction, we need to check whether transaction is challenge by FDS or not
        if ($type == 'credit_card') {

          if ($fraud == 'challenge') {
            // TODO set payment status in merchant's database to 'Challenge by FDS'
            // TODO merchant should decide whether this transaction is authorized or not in MAP
            // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
            $donation->setPending();
          } else {

            Mail::raw("Payment was successful, we have forwarded your order.", function ($message) use ($mail_data) {
              $message->to($mail_data["user_email"])->subject($mail_data["user_name"] . ", Status for Your Order #" . $mail_data["user_cart_code"]);
            });
            // TODO set payment status in merchant's database to 'Success'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
            $donation->setSuccess();
          }
        }
      } elseif ($transaction == 'settlement') {

        Mail::raw(
            "Payment with order id " . $mail_data["user_cart_code"] .
            " was successful. The payment was success. Please check your admin account on Insive Dashboard",
          function ($message) use ($mail_data) {
            $message->to(User::role('admin')->first()->email)
              ->subject(
                "Status order for user " . $mail_data["user_email"]
              );
          }
        );
        // TODO set payment status in merchant's database to 'Settlement'
        // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
        $donation->setSuccess();
      } elseif ($transaction == 'pending') {

        Mail::raw("Waiting for payment.", function ($message) use ($mail_data) {
          $message->to($mail_data["user_email"])->subject(
            $mail_data["user_name"] . ", Status for Your Order #" . $mail_data["user_cart_code"]
          );
        });
        // TODO set payment status in merchant's database to 'Pending'
        // $donation->addUpdate("Waiting customer to finish transaction order_id: " . $orderId . " using " . $type);
        $donation->setPending();
      } elseif ($transaction == 'deny') {

        // TODO set payment status in merchant's database to 'Failed'
        // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is Failed.");
        $donation->setFailed();
      } elseif ($transaction == 'expire') {

        // TODO set payment status in merchant's database to 'expire'
        // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is expired.");
        $donation->setExpired();
      } elseif ($transaction == 'cancel') {

        // TODO set payment status in merchant's database to 'Failed'
        // $donation->addUpdate("Payment using " . $type . " for transaction order_id: " . $orderId . " is canceled.");
        $donation->setFailed();
      }
    });

    return;
  }
}
