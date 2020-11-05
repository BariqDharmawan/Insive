<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Logic;

class LogicController extends Controller
{

    private function saveLogic(Logic $logic, Request $request)
    {

        $logic->face_title = $request->face_title;
        $logic->face_description = $request->face_description;
        if ($request->has('face_icon')) {
            $logic->face_icon = $request->file('face_icon')->store('public/files');
        }
        $logic->save();
        return redirect()->back()->with('success_message', 'Successfully change logic detail');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['logic'] = Logic::all();
        return view('admin.logic.homepage')->with($data);
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

        $request->validate([
            'face_title' => 'required|unique:logics',
            'face_description' => 'required|',
            'face_icon' => 'mimes:jpeg,bmp,png,svg,webp'
        ]);

        $logic = Logic::findOrFail($id);
        return $this->saveLogic($logic, $request);
    }

}
