<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Auth;

class CatalogController extends Controller
{
    public function index()
    {
        $data['product'] = Product::where('qty', '>', 0)->get();
        return view('catalog.catalog_index')->with($data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id.*' => ['required'],
            'jumlah_beli.*' => ['required'],
        ]);
        $qty = $request->jumlah_beli;
        foreach ($request->product_id as $key => $value) {
            if($qty[$key] > 0) {
                $product = Product::find($value)->first();
                
            }
        }
    }
}
