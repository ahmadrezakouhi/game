<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\QuestionAnswer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(){
        $categories = Category::with('category_answers')->with('questions')->get();

        return view('question.create',compact('categories'));
    }


public function store(Request $request){
        Question::create([
           'category_id'=>$request->get('category_id')
           ,
            'question'=>$request->get('question')
        ]);
        return redirect()->to('questions');
}

public function show($id){
        $question_answers = QuestionAnswer::with('question')->with('category_answer')
          ->where('user_id',$id)
            ->get();
        $categories = Category::get();
        return view('question.show',compact('question_answers','categories'));
}



public function destroy($id){
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->to('questions');
}


}
