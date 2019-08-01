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
<<<<<<< HEAD:app/Http/Controllers/Home/MainController.php
=======
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
>>>>>>> b5fb27d219afe707d45da2e229cfed593f01bdcb:app/Http/Controllers/Home/HomeController.php
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
    * Display face result of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function question()
    {
        return view('home.question_page');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        //
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

