<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductValidation;
use App\Models\Product;

class ProductController extends Controller
{

    protected function saveProduct(Request $request, Product $product)
    {
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->category = $request->input('category', 'mask');
        $product->type = strtolower($request->type);
        if ($request->hasFile('product_img')) {
          $getProductImg = $request->file('product_img');
          $path = $getProductImg->store('public/files');
          $product->product_img = $path;
        }
        $product->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalog = Product::latest()->paginate(10);
        return view('admin.product.list',[
          'catalog' => $catalog,
          'titlePage' => 'Catalog Product'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidation $request)
    {
      $addProduct = new Product;
      $this->saveProduct($request, $addProduct);
      
      return redirect()->back()->with('added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $singleProduct = Product::findOrFail($id);
        return view('admin.product.edit', compact('singleProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductValidation $request, $id)
    {
        $editProduct = Product::findOrFail($id);
        $this->saveProduct($request, $editProduct);
        
        return redirect()->back()->with('success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $softDelete = Product::findOrFail($id);
        $softDelete->delete();
        return redirect()->back()->with('success');
    }
    public function trashed()
    {
        $removed = Product::onlyTrashed()->get();
        return view('admin.product.trashed', compact('removed'));
    }
    public function restored($id)
    {
      $restored = Product::onlyTrashed()->findOrFail($id);
      $restored->restore();
      return redirect()->back()->with('restored');
    }
    public function permanentlyDelete($id)
    {
      $permanentDeleted = Product::onlyTrashed()->findOrFail($id);
      $permanentDeleted->forceDelete();
      return redirect()->back()->with('deleted');
    }
    public function permanentlyDeleteAll()
    {
      $permanenDeletedAll = Product::onlyTrashed();
      $permanenDeletedAll->forceDelete();
      return redirect()->route('admin.product.trashed')->with('deleted');
    }
}
