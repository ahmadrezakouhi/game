<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rank;
use App\Answer;
use App\Money;
use App\Question;
use Carbon\Carbon;

class AnswerController extends Controller
{





    public function store_letter(Request $request)
    {
        $user = auth()->user();
        $user->update([
            "letter" => $request->get('letter'),
            "letter_time" => $request->get('letter_time'),
            // "resolution"=>$request->get('resolution'),

        ]);
        return response()->json();
    }

    public function store_answer_question_game1(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Answer::create($input);
        return response()->json();
    }

    public function rank(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Rank::create($input);

        return response()->json($input);
    }

    public function money(Request $request)
    {
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Money::create($input);
        return response()->json();
    }


    public function questions(Request $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        Question::create($input);
        return response()->json();
    }


}
