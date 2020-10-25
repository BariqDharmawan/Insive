<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountValidation;
use App\Models\Product;
use App\Models\ProductDiscount;

class DiscountController extends Controller
{


    protected function saveDiscount(Request $request, ProductDiscount $discount, $goTo, $successMessage)
    {
        $discount->product_id = $request->product_id;
        $discount->discount_price = $request->discount_price;
        $discount->save();
        return redirect()->route($goTo)->with('success', $successMessage);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::select('id', 'product_name')->get();
        return view('catalog.discount', [
            'title' => 'Manage Discount',
            'products' => $products,
            'discounts' => ProductDiscount::latest()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountValidation $request)
    {
        $newDiscount = new ProductDiscount;
        $this->saveDiscount(
            $request,
            $newDiscount,
            'admin.manage-account.index',
            'Successfully delete discount'
        );
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
        $updateDiscount = ProductDiscount::findOrFail($id);
        $this->saveDiscount(
            $request,
            $updateDiscount,
            'admin.manage-account.index',
            'Successfully update discount on product ' . $updateDiscount->product->product_name
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductDiscount::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Successfully delete discount');
    }
}
