<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use App\Models\Logic;
use App\Models\Fragrance;
use App\Models\Sheet;
use App\Models\Pricing;
use App\Models\Cart;
use App\Models\CustomProduct;
use App\Models\SubCart;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexOrder()
    {
        $order = Cart::paginate(20);
        $list_order = [];
        foreach ($order as $key => $value) {
            $value->user_id = User::find($value->user_id);
            if ($value->type_cart == 'catalog') {
                $value->item = SubCart::select('products.product_name', 'products.type', 'products.category', 'sub_carts.qty', 'sub_carts.total_price')
                                        ->leftJoin('products', 'products.id', 'sub_carts.product_id')
                                        ->where('sub_carts.cart_id', $value->id)
                                        ->paginate(20);
            }
            else if ($value->type_cart == 'custom') {
                $value->item = CustomProduct::select('sheets.sheet_name', 'fragrances.fragrance_name', 'custom_products.qty')
                                              ->leftJoin('sheets', 'sheets.id', 'custom_products.sheet_id')
                                              ->leftJoin('fragrances', 'fragrances.id', 'custom_products.fragrance_id')
                                              ->where('custom_products.cart_id', $value->id)
                                              ->paginate(20);
            }
            $list_order[] = $value;
        }
        $data['list_order'] = $list_order;
        // return response()->json($data);
        return view('admin.all_order', compact('list_order', 'order'));
    }

    public function indexInvoice()
    {
      $order = Cart::paginate(20);
      $list_order = [];
      foreach ($order as $key => $value) {
          $value->user_id = User::find($value->user_id);
          if ($value->type_cart == 'catalog') {
              $value->item = SubCart::select('products.product_name', 'products.type', 'products.category', 'sub_carts.qty', 'sub_carts.total_price')
                                      ->leftJoin('products', 'products.id', 'sub_carts.product_id')
                                      ->where('sub_carts.cart_id', $value->id)
                                      ->paginate(20);
          }
          else if ($value->type_cart == 'custom') {
              $value->item = CustomProduct::select('sheets.sheet_name', 'fragrances.fragrance_name', 'custom_products.qty')
                                            ->leftJoin('sheets', 'sheets.id', 'custom_products.sheet_id')
                                            ->leftJoin('fragrances', 'fragrances.id', 'custom_products.fragrance_id')
                                            ->where('custom_products.cart_id', $value->id)
                                            ->paginate(20);
          }
          $list_order[] = $value;
      }
      $data['list_order'] = $list_order;
      return view('admin.invoice', compact('list_order'));
    }
    public function indexRecipe()
    {
      $order = Cart::paginate(20);
      $list_order = [];
      foreach ($order as $key => $value) {
          $value->user_id = User::find($value->user_id);
          if ($value->type_cart == 'catalog') {
              $value->item = SubCart::select('products.product_name', 'products.type', 'products.category', 'sub_carts.qty', 'sub_carts.total_price')
                                      ->leftJoin('products', 'products.id', 'sub_carts.product_id')
                                      ->where('sub_carts.cart_id', $value->id)
                                      ->paginate(20);
          }
          else if ($value->type_cart == 'custom') {
              $value->item = CustomProduct::select('sheets.sheet_name', 'fragrances.fragrance_name', 'custom_products.qty')
                                            ->leftJoin('sheets', 'sheets.id', 'custom_products.sheet_id')
                                            ->leftJoin('fragrances', 'fragrances.id', 'custom_products.fragrance_id')
                                            ->where('custom_products.cart_id', $value->id)
                                            ->paginate(20);
          }
          $list_order[] = $value;
      }
      $data['list_order'] = $list_order;
      return view('admin.recipe', compact('list_order'));
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
        //
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
