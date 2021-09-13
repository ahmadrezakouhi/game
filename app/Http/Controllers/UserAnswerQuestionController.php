<?php

namespace App\Http\Controllers;

use App\Question;
use App\QuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAnswerQuestionController extends Controller
{





    public function questions()
    {
        $questions = Question::orderBy('category_id')->paginate(10);

        return view('question.answer_questions', compact('questions'));
    }





    public function answerQuestion(Request $request)
    {

        $user = Auth::user();

        foreach ($request->all() as $key => $value) {
            if (is_numeric($key)) {
                QuestionAnswer::create(['user_id' => $user->id, 'question_id' => $key, 'category_answer_id' => $value]);
            }
        }


        if ($request->hasMorePages) {

            return redirect($request->nextPageUrl);
        }

        return view('question.finish');
    }
}
