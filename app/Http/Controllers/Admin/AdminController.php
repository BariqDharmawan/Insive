<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\AboutUs;
use App\User;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use App\Models\Logic;
use App\Models\Fragrance;
use App\Models\Sheet;
use App\Models\Pricing;
use App\Models\Cart;
use App\Models\ContactUs;
use App\Models\CustomProduct;
use App\Models\SubCart;
use App\Models\Shipping;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.dashboard', ['adminAccount' => $this->adminAccount->first()]);
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function indexOrder()
    {
        $order = Cart::all();
        $list_order = [];
        foreach ($order as $key => $value) {
            $value->user_id = User::find($value->user_id);
            if ($value->type_cart == 'catalog') {
                $value->item = SubCart::select('products.product_name', 'products.type', 'products.category', 'sub_carts.qty', 'sub_carts.total_price')
                ->leftJoin('products', 'products.id', 'sub_carts.product_id')
                ->where('sub_carts.cart_id', $value->id)
                ->get();
            }
            else if ($value->type_cart == 'custom') {
                $value->item = CustomProduct::select('sheets.sheet_name', 'fragrances.fragrance_name', 'custom_products.qty')
                ->leftJoin('sheets', 'sheets.id', 'custom_products.sheet_id')
                ->leftJoin('fragrances', 'fragrances.id', 'custom_products.fragrance_id')
                ->where('custom_products.cart_id', $value->id)
                ->get();
            }
            $list_order[] = $value;
        }
        $data['list_order'] = $list_order;
        // return response()->json($data);
        return view('admin.all_order', compact('list_order', 'order'));
    }

    public function indexInvoice()
    {
        $order = Cart::all();
        $list_order = [];
        foreach ($order as $key => $value) {
            $value->user_id = User::find($value->user_id);
            if ($value->type_cart == 'catalog') {
                $value->item = SubCart::select('products.product_name', 'products.type', 'products.category', 'sub_carts.qty', 'sub_carts.total_price')
                ->leftJoin('products', 'products.id', 'sub_carts.product_id')
                ->where('sub_carts.cart_id', $value->id)
                ->get();
            }
            else if ($value->type_cart == 'custom') {
                $value->item = CustomProduct::select('sheets.sheet_name', 'fragrances.fragrance_name', 'custom_products.qty')
                ->leftJoin('sheets', 'sheets.id', 'custom_products.sheet_id')
                ->leftJoin('fragrances', 'fragrances.id', 'custom_products.fragrance_id')
                ->where('custom_products.cart_id', $value->id)
                ->get();
            }
            $list_order[] = $value;
        }
        $data['list_order'] = $list_order;
        // dd($data);
        // return response()->json($data);
        return view('admin.invoice', compact('list_order'));
    }
    public function indexRecipe()
    {
        $order = Cart::all();
        $list_order = [];
        foreach ($order as $key => $value) {
            $value->user_id = User::find($value->user_id);
            if ($value->type_cart == 'catalog') {
                $value->item = SubCart::select('products.product_name', 'products.type', 'products.category', 'sub_carts.qty', 'sub_carts.total_price')
                ->leftJoin('products', 'products.id', 'sub_carts.product_id')
                ->where('sub_carts.cart_id', $value->id)
                ->get();
            }
            else if ($value->type_cart == 'custom') {
                $value->item = CustomProduct::select('sheets.sheet_name', 'fragrances.fragrance_name', 'custom_products.qty')
                ->leftJoin('sheets', 'sheets.id', 'custom_products.sheet_id')
                ->leftJoin('fragrances', 'fragrances.id', 'custom_products.fragrance_id')
                ->where('custom_products.cart_id', $value->id)
                ->get();
            }
            $list_order[] = $value;
        }
        $data['list_order'] = $list_order;
        // return response()->json($data);
        return view('admin.recipe', compact('list_order'));
    }

    public function getInvoice($id)
    {
        $order = Cart::findOrFail($id);
        $order->user = User::findOrFail($order->user_id);
        $order->shipping = Shipping::findOrFail($order->shipping_id);
        if(!empty($order->logic_id)) {
            $order->logic = Logic::findOrFail($order->logic_id);
        }
        if ($order->type_cart == 'catalog') {
            $order->item = SubCart::select('products.product_name', 'products.type', 'products.category', 'sub_carts.qty', 'sub_carts.total_price')
            ->leftJoin('products', 'products.id', 'sub_carts.product_id')
            ->where('sub_carts.cart_id', $order->id)
            ->get();
        }
        else if ($order->type_cart == 'custom') {
            $order->item = CustomProduct::select('sheets.sheet_name', 'fragrances.fragrance_name', 'custom_products.qty')
            ->leftJoin('sheets', 'sheets.id', 'custom_products.sheet_id')
            ->leftJoin('fragrances', 'fragrances.id', 'custom_products.fragrance_id')
            ->where('custom_products.cart_id', $order->id)
            ->get();
        }
        $data['list_order'] = $order;
        // return response()->json($data);
        return view('admin.invoice_customer_print')->with($data);
    }

    public function singleRecipe($single)
    {
      $order = Cart::findOrfail($single);
      $list_order = [];
      foreach ($order as $key => $value) {
          $value->user_id = User::find($value->user_id);
          if ($value->type_cart == 'catalog') {
              $value->item = SubCart::select('products.product_name', 'products.type', 'products.category', 'sub_carts.qty', 'sub_carts.total_price')
                                      ->leftJoin('products', 'products.id', 'sub_carts.product_id')
                                      ->where('sub_carts.cart_id', $value->id)
                                      ->get();
          }
          else if ($value->type_cart == 'custom') {
              $value->item = CustomProduct::select('sheets.sheet_name', 'fragrances.fragrance_name', 'custom_products.qty')
                                            ->leftJoin('sheets', 'sheets.id', 'custom_products.sheet_id')
                                            ->leftJoin('fragrances', 'fragrances.id', 'custom_products.fragrance_id')
                                            ->where('custom_products.cart_id', $value->id)
                                            ->get();
          }
          $list_order[] = $value;
      }
      $data['list_order'] = $list_order;
      // return response()->json($data);
      return view('admin.single_recipe', compact('list_order'));
    }

    public function findInvoiceRecipe(Request $request)
    {
        if ($request->has('find_invoice')) {
            $find = Cart::where('formula_code', 'LIKE', '%' . $request->find_invoice. '%')->get();
            return view('admin.find_result', compact('find'));
        }
        elseif ($request->has('find_recipe')) {
            $find = Cart::where('formula_code', 'LIKE', '%' . $request->find_invoice. '%')->get();
            return view('admin.find_result', compact('find'));
        }
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
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updateTrackingOrder(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->tracking_number = $request->tracking_number;
        $cart->save();
        return response()->json(['status' => 200, 'tracking_number' => $request->tracking_number, 'message' => 'Success input tracking number!']);
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


    /**
     * get admin account and insive contact
     *
     * @return $adminAccount = $this->adminAccount
     * @throws conditon
     **/
    public function setting()
    {
        return view('admin.setting.index', [
            'aboutUs' => AboutUs::first(), 
            'adminAccount' => $this->adminAccount->first()
        ]);
    }

    /**
     * update admin account
     *
     * @param User role admin
     **/
    public function updateAccount(UserRequest $request)
    {
        $adminAccount = $this->adminAccount->first();
        
        if ($request->has('name')) {
            $adminAccount->name = $request->name;
        }
        if ($request->has('email_admin')) {
            $adminAccount->email = $request->email_admin;
        }
        if ($request->has('new_password') and $request->filled('new_password')) {
            $adminAccount->password = Hash::make($request->new_password);
        }

        $adminAccount->save();
        return redirect()->back();

    }

}