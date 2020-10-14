<?php

namespace App\Http\Controllers\Admin;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{

    protected function saveAboutData(Request $request)
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->saveAboutData($request);
        return redirect()->back();
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
        $this->saveAboutData($request);
        return response()->json(['success' => 'Successfully update Insive contact']);
    }

}
