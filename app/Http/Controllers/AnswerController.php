<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rank;
use App\Answer;
use App\Money;
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
        $input= $request->all();
        $input['user_id']=auth()->user()->id;
        Answer::create($input);
        return response()->json();
    }

    public function store_rank(Request $request){
       $input = $request->all();
       $input['user_id']= auth()->user()->id;
       Rank::create($input);

        return response()->json($input);
    }

    public function money(Request $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        Money::create($input);
        return response()->json();
    }

}
