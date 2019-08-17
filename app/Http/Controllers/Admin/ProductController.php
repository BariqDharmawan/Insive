<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->paginate(5);
        return view('admin.product.list', compact('products'));
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
    public function store(Request $request)
    {
      $addProduct = new Product;
      $addProduct->product_name = $request->product_name;
      $addProduct->price = $request->price;
      $addProduct->qty = $request->qty;
      $addProduct->type = strtolower($request->type);
      $addProduct->product_img = $request->file('product_img')->store('public/files');
      $addProduct->save();
      return redirect()->back()->with('added');
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
    public function update(Request $request, $id)
    {
        $editProduct = Product::findOrFail($id);
        $editProduct->product_name = $request->product_name;
        $editProduct->price = $request->price;
        $editProduct->qty = $request->qty;
        $editProduct->type = $request->type;
        if ($request->hasFile('product_img')) {
          $getProductImg = $request->file('product_img');
          $path = $getProductImg->store('public/files');
          $editProduct->product_img = $path;
        }
        $editProduct->save();
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
