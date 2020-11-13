<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sheet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CustomProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sheet'] = Sheet::all();
        return view('admin.sheet.homepage')->with($data);
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
            'sheet_name' => 'required',
            'sheet_img' => 'required|image|mimes:png,jpg,jpeg,gif',
            'is_available' => 'required|digits_between:0,1',
            'sheet_price' => 'required|integer|min:1000|max:999999999'
        ]);

        $table = new Sheet;
        $table->sheet_name = $request->sheet_name;
        $table->is_available = $request->is_available;
        $table->price = $request->sheet_price;
        $file = $request->file('sheet_img');
        $filename = date('Y_m_d_His') . '_' . Str::slug($request->sheet_name, '_') . "." . $file->getClientOriginalExtension();
        $table->sheet_img = $filename;
        $table->save();
        $file->move("img/sheet/", $filename);
        $request->session()->flash('success_message', "Success adding " . $table->sheet_name);
        return redirect()->route('admin.sheet.index');
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

        $request->validate([
            'sheet_name' => 'required',
            'is_available' => 'required|digits_between:0,1',
            'sheet_price' => 'required|integer|min:1000|max:999999999'
        ]);

        if (!empty($request->sheet_img)) {
            $request->validate(['sheet_img' => 'image|mimes:png,jpg,jpeg,gif|required']);
        }

        $table = Sheet::findOrfail($id);
        $oldFilename = $table->sheet_name;
        $table->sheet_name = $request->sheet_name;
        $table->is_available = $request->is_available;
        $table->price = $request->sheet_price;
        if (!empty($request->sheet_img)) {
            $file = $request->file('sheet_img');
            $filename = date('Y_m_d_His') . '_' . Str::slug($request->sheet_name, '_') . "." . $file->getClientOriginalExtension();
            $table->sheet_img = $filename;
            File::delete('img/sheet/' . $oldFilename);
            $file->move("img/sheet/", $filename);
        }
        $table->save();
        return redirect()->route('admin.sheet.index')->with(
            'success_message',
            "Success update " . $table->sheet_name
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $table = Sheet::findOrfail($id);
        $exist = CustomProduct::where('sheet_id', $id)->count();
        $name = $table->sheet_name;
        if ($exist > 0) {
            $request->session()->flash('failed_message', "Failed delete " . $name . " because has bought!");
            return redirect()->route('admin.sheet.index');
        }
        $table->delete();
        $request->session()->flash('success_message', "Success delete " . $name);
        return redirect()->route('admin.sheet.index');
    }
}
