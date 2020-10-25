<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    $catalog = Product::leftJoin('product_discount as prod_d', 'products.id', '=', 'prod_d.product_id')
                        ->select('products.*', DB::raw('IFNULL(`prod_d`.`discount_price`, 0) as discount_price'))
                        ->latest()
                        ->paginate(10);
    // dd($catalog);
    return view('admin.product.list', [
      'catalog' => $catalog,
      'titlePage' => 'Catalog Product'
    ]);
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

    return redirect()->back()->with('success', 'Product Has Been Added');
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

    return redirect()->back()->with(
      'success',
      'Successfully update product with name ' . $editProduct->product_name
    );
  }

  /**
   * Remove specified product
   *
   * @param  int $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $softDelete = Product::findOrFail($id);
    $softDelete->delete();
    return redirect()->back()->with('success');
  }

  /**
   * display deleted product
   *
   **/
  public function trashed()
  {
    $removed = Product::onlyTrashed()->get();
    return view('admin.product.trashed', [
      'removed' => $removed,
      'titlePage' => 'Product Trashed'
    ]);
  }

  /**
   * restoring deleted product
   *
   **/
  public function restored($id)
  {
    $restored = Product::onlyTrashed()->findOrFail($id);
    $restored->restore();
    return redirect()->back()->with('restored');
  }

  /**
   * permanently deleting specified product
   * @param int $id
   **/
  public function permanentlyDelete($id)
  {
    $permanentDeleted = Product::onlyTrashed()->findOrFail($id);
    $permanentDeleted->forceDelete();
    return redirect()->back()->with('deleted');
  }

  /**
   * permanently deleting all trashed product
   * @param int $id
   **/
  public function permanentlyDeleteAll()
  {
    $permanenDeletedAll = Product::onlyTrashed();
    $permanenDeletedAll->forceDelete();
    return redirect()->route('admin.product.trashed')->with('deleted');
  }
}
