<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use App\Models\SubCart;
use Auth;

class CatalogController extends Controller
{
    public function index()
    {
        $data['product'] = Product::where('qty', '>', 0)->paginate(20);
        return view('catalog.catalog_index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id.*' => ['required'],
            'jumlah_beli.*' => ['required'],
        ]);
        $user_id = Auth::user()->id;
        $table = Cart::firstOrCreate(
            ['user_id' => $user_id, 'type_cart' => 'catalog', 'status' => 'waiting'],
            ['user_id' => $user_id, 'cart_code' => 'C'.date('HisYmd'), 'formula_code' => '#02319', 'type_cart' => 'catalog', 'status' => 'waiting']
        );
        SubCart::where('cart_id', $table->id)->delete();
        $qty = $request->jumlah_beli;
        foreach ($request->product_id as $key => $value) {
            if($qty[$key] > 0) {
                $product = Product::find($value)->first();
                $subCart = new SubCart;
                $subCart->user_id = $user_id;
                $subCart->cart_id = $table->id;
                $subCart->product_id = $product->id;
                $subCart->qty = $qty[$key];
                $subCart->total_price = $qty[$key]*$product->price;
                $subCart->save();
            }
        }

        return redirect()->route('cart.fill.address.catalog');
    }

    public function cartIndex()
    {

    }
}
