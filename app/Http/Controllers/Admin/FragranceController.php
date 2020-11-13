<?php

namespace App\Http\Controllers\Admin;

use Date;
use App\Models\Fragrance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CustomProduct;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class FragranceController extends Controller
{

    protected function saveFragrance(Fragrance $fragrance, Request $request)
    {
        $fragranceName = $request->fragrance_name;

        $fragrance->fragrance_name = $fragranceName;
        $fragrance->price = $request->fragrance_price;
        $fragrance->is_available = $request->is_available;

        if ($request->has('fragrance_img')) {
            $file = $request->file('fragrance_img');
            $filename = str_replace(' ', '_', Carbon::now()) . '_' . $file->getClientOriginalName();
            $file->move("img/fragrance/", $filename);

            $fragrance->fragrance_img = $filename;
        }
        $fragrance->save();
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fragrance_name' => 'required|max:255',
            'is_available' => 'required|digits_between:0,1',
            'fragrance_price' => 'required|integer|min:1000|max:999999999',
            'fragrance_img' => 'required|image|mimes:png,jpg,jpeg,gif'
        ]);

        $fragrance = new Fragrance;

        $this->saveFragrance($fragrance, $request);

        return redirect()->route('admin.fragrance.index')->with(
            'success_message',
            "Success adding " . $fragrance->fragrance_name
        );
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
            'fragrance_name' => 'required|max:255',
            'is_available' => 'required|digits_between:0,1',
            'fragrance_price' => 'required|integer|min:1000|max:999999999',
            'fragrance_img' => 'nullable|mimes:png,jpg,jpeg,gif'
        ]);

        $fragrance = Fragrance::findOrfail($id);
        if ($request->has('fragrance_img')) {
            File::delete('img/fragrance/' . $fragrance->fragrance_img);
        }
        $this->saveFragrance($fragrance, $request);



        return redirect()->route('admin.fragrance.index')->with(
            'success_message',
            "Success update " . $fragrance->fragrance_name
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
        $table = Fragrance::findOrfail($id);
        $exist = CustomProduct::where('fragrance_id', $id)->count();
        $name = $table->fragrance_name;
        if ($exist > 0) {
            $request->session()->flash('failed_message', "Failed delete " . $name . " because has bought!");
            return redirect()->route('admin.fragrance.index');
        }
        $table->delete();
        $request->session()->flash('success_message', "Success delete " . $name);
        return redirect()->route('admin.fragrance.index');
    }
}
