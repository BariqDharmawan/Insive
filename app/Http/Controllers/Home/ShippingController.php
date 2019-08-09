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
use App\Models\Shipping;
use App\Models\Cart;
use App\Models\CustomProduct;
use Auth;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'customer_fullname' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'customer_city' => 'required',
            'customer_address' => 'required'
        ]);
        $client = new GuzzleClient(['headers' => ['key' => 'a9833b70a0d2e26d4f36024e66e6fdaa']]);
        $requester = $client->get('https://api.rajaongkir.com/starter/city?id='.$request->customer_city);
        $response = json_decode($requester->getBody()->getContents(), true);
        $user_id = Auth::user()->id;
        if($response['rajaongkir']['status']['code'] == 200) {
            $data = [
                'user_id' => $request->user_id, 
                'name' => $request->customer_fullname, 
                'email' => $request->customer_email, 
                'phone' => $request->customer_phone,
                'city' => $response['rajaongkir']['results']['city_name'],
                'city_id' => $request->customer_city,
                'address' => $request->customer_address
                ];
                $table = Shipping::orderBy('id', 'desc')->firstOrCreate(
                    ['user_id' => $user_id, 'status' => 'unactive'], $data
                );
                
                $cart_id = Cart::where([['user_id', '=', $user_id],['status', '=', 'waiting']])->firstOrFail();
                $cart_id->shipping_id = $table->id;
                $cart_id->save();
        
                return redirect()->route('cart.custom.payment');
        } else {
            return redirect()->back();
        }
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
