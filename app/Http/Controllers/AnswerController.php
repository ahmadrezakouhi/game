<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rank;
use App\Answer;
use Carbon\Carbon;

class AnswerController extends Controller
{


    public function show($id){
        $user = User::with('answers')->with('ranks')->findOrFail($id);
        $answers_cat1 = $user->answers()->where('category',1)->get();
        $ranks = $user->ranks()->get();
        $answers_cat2 = $user->answers()->where('category',2)->get();
        $answers_cat3 = $user->answers()->where('category',3)->get();
        return view('result.index',compact('user','ranks','answers_cat1','answers_cat2','answers_cat3'));
    }


    public function store_letter(Request $request){
        $user = auth()->user();
        $user->update([
           "letter"=>$request->get('letter'),
           "letter_time"=>$request->get('letter_time'),
          // "resolution"=>$request->get('resolution'),

        ]);
       return response()->json();

    }

    public function store_answer_question_game1(Request $request){
        Answer::create([
            'user_id'=>auth()->user()->id
            ,
            'result'=>$request->get('result')
            ,
            'time'=>$request->get('time')
           
        ]);
        return response()->json();
    }

    public function store_rank(Request $request){
        Rank::create([
            'user_id'=>auth()->user()->id
            ,
            'first_person'=> $request->get('first_person')
            ,
            'last_person'=>$request->get('last_person')
            ,
            'time'=>$request->get('time')
        ]);

        return response()->json();
    }


}
