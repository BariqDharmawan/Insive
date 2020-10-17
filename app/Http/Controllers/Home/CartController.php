<?php

namespace App\Http\Controllers\Home;

use Veritrans_Snap;
use App\Models\Cart;
use App\Models\Logic;
use App\Models\Sheet;
use Veritrans_Config;
use App\Models\Answer;
use App\Models\Option;
use App\Models\Pricing;
use App\Models\SubCart;
use App\Models\Question;
use App\Models\Shipping;
use App\Models\Fragrance;
use Veritrans_Notification;
use Illuminate\Http\Request;
use App\Models\CustomProduct;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;

class CartController extends Controller
{

    public function __construct(Request $request)
    {
        $this->request = $request;

        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where([['user_id', '=', $user_id], ['type_cart', '=', 'custom'], ['status', '=', 'waiting']])->first();
        if(empty($cart)) {
            return redirect(url('/'));
        }
        $data['sub_cart'] = CustomProduct::where('cart_id', $cart->id)->get();
        if(empty($data['sub_cart'])) {
            return redirect(url('question'));
        }
        $data['sheet'] = Sheet::where('qty', '>', 0)->get();
        $data['fragrance'] = Fragrance::where('qty', '>', 0)->get();
        $data['price'] = Pricing::all();
        return view('home.cart')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexShipping()
    {
        $client = new GuzzleClient([
            'headers' => ['key' => 'a9833b70a0d2e26d4f36024e66e6fdaa']
        ]);
        $request = $client->get('https://api.rajaongkir.com/starter/city');
        $response = json_decode($request->getBody()->getContents(), true);
        if($response['rajaongkir']['status']['code'] === 200) {
            $data['allCities'] = $response['rajaongkir']['results'];
        }
        else {
            $data['allCities'] = Indonesia::allProvinces();
        }
        return view('shipping.custom-order')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexShippingCatalog()
    {
        $client = new GuzzleClient([
            'headers' => ['key' => 'a9833b70a0d2e26d4f36024e66e6fdaa']
        ]);
        $request = $client->get('https://api.rajaongkir.com/starter/city');
        $response = json_decode($request->getBody()->getContents(), true);
        if($response['rajaongkir']['status']['code'] === 200) {
            $data['allCities'] = $response['rajaongkir']['results'];
        }
        else {
            $data['allCities'] = Indonesia::allProvinces();
        }
        return view('shipping.catalog-order')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPayment()
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where([['user_id', '=', $user_id],['type_cart', '=', 'custom'],['status', '=', 'waiting']])->firstOrFail();
        $shipping = Shipping::where('id', '=', $cart->shipping_id)->firstOrFail();
        $qty_package = CustomProduct::where('cart_id', $cart->id)->sum('qty');
        $price_package = Pricing::where('min_qty' , '<=', (int)$qty_package)->orderBy('min_qty', 'DESC')->first()->price;
        $client = new GuzzleClient([
            'headers' => ["content-type" => "application/x-www-form-urlencoded", 'key' => 'a9833b70a0d2e26d4f36024e66e6fdaa']
        ]);

        $request = $client->post('https://api.rajaongkir.com/starter/cost', [
			'form_params' => ['origin' => 154, 'destination' => $shipping->city_id, 'weight' => '1000', 'courier' => 'jne']
		]);
        $response = json_decode($request->getBody()->getContents(), true);
        if($response['rajaongkir']['status']['code'] === 200) {
            $ongkir = $response['rajaongkir']['results'];
            $city_name = $response['rajaongkir']['destination_details']['city_name'];
        } else {
            $ongkir = 0;
            $city_name = "";
        }
        $data['formula_code'] = $cart->formula_code;
        $data['price'] = $qty_package*$price_package;
        $data['shipping_cost'] = ($ongkir[0]['costs'][0]['cost'][0]['value']+10000);
        $data['city_name'] = $city_name;
        $data['total_price'] = ($data['price']+$data['shipping_cost']);
        $cart->total_qty = $qty_package;
        $cart->total_price = $qty_package*$price_package;
        $cart->shipping_cost = $data['shipping_cost'];
        $cart->save();
        return view('home.payment_page')->with($data);
    }

    public function postPayment(Request $request)
    {
      \DB::transaction(function(){
            // Save donasi ke database
            $donation = Cart::create([
                'user_id' => $request->donor_name,
                'total_price' => floatval($request->total_price),
            ]);

            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $donation->id,
                    'gross_amount'  => $donation->total_price,
                ],
                'customer_details' => [
                    'first_name' => Auth::id(),
                    'email' => Auth::user()->email,
                ],
                'item_details' => [
                  [
                    'price' => $donation->amount,
                  ]
                ]
            ];
            $donation->snap_token = Veritrans_Snap::getSnapToken($payload);
            $donation->save();
            // Beri response snap token
            $this->response['snap_token'] = $snapToken;
        });

        return response()->json($this->response);
    }

    public function notificationHandler(Request $request)
    {
        $notif = new Veritrans_Notification();
        \DB::transaction(function() use($notif) {

          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $donation = Donation::findOrFail($orderId);

          if ($transaction == 'capture') {
 
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {

              if($fraud == 'challenge') {
                // TODO set payment status in merchant's database to 'Challenge by FDS'
                // TODO merchant should decide whether this transaction is authorized or not in MAP
                // $donation->addUpdate("Transaction order_id: " . $orderId ." is challenged by FDS");
                $donation->setPending();
              } else {
                // TODO set payment status in merchant's database to 'Success'
                // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully captured using " . $type);
                $donation->setSuccess();
              }

            }

          } elseif ($transaction == 'settlement') {

            // TODO set payment status in merchant's database to 'Settlement'
            // $donation->addUpdate("Transaction order_id: " . $orderId ." successfully transfered using " . $type);
            $donation->setSuccess();

          } elseif($transaction == 'pending'){

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexCatalogPayment()
    {
        $user_id = Auth::id();
        $cart = Cart::where([
            ['user_id', $user_id],
            ['type_cart', 'catalog'],
            ['status', 'waiting']
        ])->firstOrFail();
        $shipping = Shipping::where('id', $cart->shipping_id)->firstOrFail();
        $qty_package = SubCart::where('cart_id', $cart->id)->sum('qty');
        $price_package = SubCart::where('cart_id', $cart->id)->sum('total_price');
        $client = new GuzzleClient([
            'headers' => ["content-type" => "application/x-www-form-urlencoded", 'key' => 'a9833b70a0d2e26d4f36024e66e6fdaa']
        ]);

        $request = $client->post('https://api.rajaongkir.com/starter/cost', [
			'form_params' => ['origin' => 154, 'destination' => $shipping->city_id, 'weight' => '1000', 'courier' => 'jne']
		]);
        $response = json_decode($request->getBody()->getContents(), true);
        if($response['rajaongkir']['status']['code'] === 200) {
            $ongkir = $response['rajaongkir']['results'];
            $city_name = $response['rajaongkir']['destination_details']['city_name'];
        } else {
            $ongkir = 0;
            $city_name = "";
        }
        $data['formula_code'] = $cart->formula_code;
        $data['price'] = $price_package;
        $data['shipping_cost'] = ($ongkir[0]['costs'][0]['cost'][0]['value']+10000);
        $data['city_name'] = $city_name;
        $data['total_price'] = ($data['price']+$data['shipping_cost']);
        $cart->total_qty = $qty_package;
        $cart->total_price = $price_package;
        $cart->shipping_cost = $data['shipping_cost'];
        $cart->save();
        return view('home.payment_catalog_page')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $product_id = $request->input('product_id');
        $sheet_id = $request->input('sheet_id');
        $fragrance_id = $request->input('fragrance_id');
        $qty_product = $request->input('qty_product');
        foreach ($product_id as $key => $value) {
            if($qty_product[$key] > 0) {
                CustomProduct::where('id', $value)
                        ->update(['sheet_id' => $sheet_id[$key], 'fragrance_id' => $fragrance_id[$key], 'qty' => $qty_product[$key]]);
            } else {
                CustomProduct::where('id', $value)->delete();
            }
        }
        return redirect(url('address/user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
