<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{

    protected function saveAboutData(AboutUs $aboutUs, Request $request)
    {
        $aboutUs->updateOrCreate(
            ['id' => 1],
            [
                'instagram' => $request->instagram,
                'phone' => $request->phone,
                'email' => $request->email,
                'embeded_map' => $request->embeded_map
            ]
        );
    }

    /**
     * Display insive contact like email, instagram, and phone
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs = AboutUs::first();
        // return view('admin.setting');
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
        $insertAboutUs = new AboutUs;
        $this->saveAboutData($insertAboutUs, $request);
        return redirect()->back();
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
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $aboutUs)
    {
        AboutUs::updateOrCreate(
            ['id' => 1],
            [
                'instagram' => $request->instagram,
                'phone' => $request->phone,
                'email' => $request->email,
                'embeded_map' => $request->embeded_map
            ]
        );
        // $this->saveAboutData($aboutUs, $request);
        return response()->json(['success' => 'Successfully update Insive contact']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AboutUs::first()->delete();
        return redirect()->back();
    }
}
