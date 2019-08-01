<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use App\Models\Logic;
use Auth;
use Indonesia;

class MainController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $allCities = Indonesia::allProvinces();
        return view('question', compact('allCities'));
    }

    /**
    * Display face result of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function faceResult()
    {
        $user_id = Auth::user()->id;
        $answers = Answer::select('answers.question_id','answers.option_id','options.text')
        ->join('options', 'options.id', 'answers.option_id')
        ->where('answers.user_id' , '=', $user_id)
        ->get()->toArray();
        $option_3;
        $option_4;
        foreach ($answers as $key => $value) {
            if($value['question_id'] == 3) {
                $option_3 = $value['text'];
            }
            else if($value['question_id'] == 4){
                $option_4 = $value['text'];
            }
        }
        $data['result'] = Logic::where([['option_3', '=', $option_3], ['option_4', '=', $option_4]])->firstOrFail();
        // dd($result);
        return view('home.face_result')->with($data);
    }

    /**
    * Display question of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function question()
    {
        $data['question'] = Question::findOrfail(1);
        return view('home.question_page')->with($data);
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
            if($id == 16) {
                $data['allCities'] = Indonesia::allProvinces();
            }
            return response()->json([
                'type' => $data['question']->type,
                'view' => view('home.question_soal_single')->with($data)->render()
            ], 200);
        }
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
        //
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

