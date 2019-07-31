<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use Auth;

class QuestionController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $data['question'] = Question::all();
        return view('admin.question.q_index')->with($data);
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        
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
        $data['question'] = Question::findOrfail($id);
        return view('admin.question.q_single')->with($data);
    }
    
    public function getSoal(Request $request, $id)
    {
        $option = $request->option_id;
        $question = Question::findOrfail($id);
        if($question['status'] == "logic" && $option != null) {
            $match = ['user_id' => Auth::user()->id, 'question_id' => $id];
            Answer::updateOrCreate(
                $match,
                ['option_id' => $option]
            );
        }
        if($id == 17) {
            return response()->json([
            ], 201);
        }
        else {
            $data['question'] = Question::findOrfail(($id+1));
            return response()->json([
                'view' => view('admin.question.q_soal_single')->with($data)->render()
            ], 200);
        }
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
        //
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        //
    }
}
