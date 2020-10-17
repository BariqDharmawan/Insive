<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fragrance;
use App\Models\CustomProduct;
use Str;
use File;
use Date;

class FragranceController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['fragrance'] = Fragrance::all();
        return view('fragrance.homepage')->with($data);
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
        $request->validate(['fragrance_name' => 'required', 'fragrance_status' => 'integer|required', 'fragrance_img' => 'image|mimes:png,jpg,jpeg,gif|required']);
        $table = new Fragrance;
        $table->fragrance_name = $request->fragrance_name;
        $table->qty = $request->fragrance_status;
        $file = $request->file('fragrance_img');
        $filename = date('Y_m_d_His').'_'.Str::slug($request->fragrance_name, '_').".".$file->getClientOriginalExtension();
        $table->fragrance_img = $filename;
        $table->save();
        $file->move("img/fragrance/", $filename);
        $request->session()->flash('success_message', "Success adding ".$table->fragrance_name);
        return redirect()->route('admin.fragrance.index');
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
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function updateApi(Request $request, $id)
    {
        $request->validate(['fragrance_name' => 'required', 'fragrance_status' => 'integer|required']);
        if(!empty($request->fragrance_img)) {
            $request->validate(['fragrance_img' => 'image|mimes:png,jpg,jpeg,gif|required']);
        }
        $table = Fragrance::findOrfail($id);
        $oldFilename = $table->fragrance_name;
        $table->fragrance_name = $request->fragrance_name;
        $table->qty = $request->fragrance_status;
        if(!empty($request->fragrance_img)) {
            $file = $request->file('fragrance_img');
            $filename = date('Y_m_d_His').'_'.Str::slug($request->fragrance_name, '_').".".$file->getClientOriginalExtension();
            $table->fragrance_img = $filename;
            File::delete('img/fragrance/'.$oldFilename);
            $file->move("img/fragrance/", $filename);
        }
        $table->save();
        $request->session()->flash('success_message', "Success update ".$table->fragrance_name);
        return redirect()->route('admin.fragrance.index');
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Request $request, $id)
    {
        $table = Fragrance::findOrfail($id);
        $exist = CustomProduct::where('fragrance_id', $id)->count();
        $name = $table->fragrance_name;
        if($exist > 0) {
            $request->session()->flash('failed_message', "Failed delete ".$name." because has bought!");
            return redirect()->route('admin.fragrance.index');
        }
        $table->delete();
        $request->session()->flash('success_message', "Success delete ".$name);
        return redirect()->route('admin.fragrance.index');
    }
}
