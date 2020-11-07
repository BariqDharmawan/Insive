<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\Product;
use App\Models\SubCart;
use Illuminate\Http\Request;
use App\Models\ProductDiscount;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $product = Product::with('discount')->where('qty', '>', 0)->paginate(20);
        return view('catalog.homepage', [
            'product' => $product,
            'discount' => ProductDiscount::all()
        ]);
    }

    public function summaryOrder()
    {
        $user_id = Auth::id();
        $cart = Cart::where([['user_id', '=', $user_id], ['type_cart', '=', 'catalog'], ['status', '=', 'waiting']])->first();
        if (empty($cart)) {
            return redirect(url('/'));
        }
        $sub_cart = SubCart::select('sub_carts.*', 'products.product_name as product_name')
                            ->leftJoin('products', 'products.id', '=', 'sub_carts.product_id')
                            ->where('cart_id', $cart->id)->get();
        $data['sub_cart'] = $sub_cart;
        // dd($data);
        return view('home.summary-order-catalog')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id.*' => ['required'],
            'jumlah_beli.*' => ['required'],
        ]);
        $user_id = Auth::id();
        $code_cart = Cart::orderBy('id', 'desc')->first();
        if (empty($code_cart)) {
            $code = 'C' . date('HisYmd') . $user_id . sprintf('%05d', 1);
        } else {
            $code = 'C' . date('HisYmd') . $user_id . sprintf('%05d', substr($code_cart->cart_code, -5) + 1);
        }
        $table = Cart::firstOrCreate(
            [
                'user_id' => $user_id,
                'type_cart' => 'catalog',
                'status' => 'waiting'
            ],
            [
                'user_id' => $user_id,
                'cart_code' => $code,
                'formula_code' => '#01234',
                'type_cart' => 'catalog',
                'status' => 'waiting'
            ]
        );
        SubCart::where('cart_id', $table->id)->delete();
        $qty = $request->jumlah_beli;
        foreach ($request->product_id as $key => $value) {
            if ($qty[$key] > 0) {
                $product = Product::with('discount')->where('id', $value)->first();
                $subCart = new SubCart;
                $subCart->user_id = $user_id;
                $subCart->cart_id = $table->id;
                $subCart->product_id = $product->id;
                $subCart->qty = $qty[$key];
                $subCart->price = ($product->discount)? $product->discount->discount_price : $product->price;
                $subCart->total_price = $qty[$key] * $subCart->price;
                $subCart->save();
            }
        }

        return redirect()->route('summary.orders.catalog');
    }

    public function cartIndex()
    {
    }
}
