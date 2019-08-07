<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client as GuzzleClient;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use App\Models\Logic;
use App\Models\Fragrance;
use App\Models\Sheet;
use App\Models\Pricing;
use App\Models\Cart;
use App\Models\CustomProduct;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where([['user_id', '=', $user_id], ['status', '=', 'waiting']])->first();
        if(empty($cart)) {
            return redirect(url('/'));
        }
        $data['sub_cart'] = CustomProduct::where('cart_id', $cart->id)->get();
        if(empty($data['sub_cart'])) {
            return redirect(url('question'));
        }
        $data['sheet'] = Sheet::where('qty', '>', 0)->get();
        $data['fragrance'] = Fragrance::where('qty', '>', 0)->get();
        return view('home.cart_page')->with($data);
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
        return redirect(url('fill-address'));
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
