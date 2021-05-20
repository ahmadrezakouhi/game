<?php

namespace App\Http\Controllers;

use App\CategoryAnswer;
use Illuminate\Http\Request;

class CategoryAnswerController extends Controller
{
    public function store(Request $request){
        CategoryAnswer::create([
            'category_id'=>$request->get('category_id')
            ,
            'name'=>$request->get('name')
        ]);

        return redirect()->to('questions');
    }

    public function destroy($id){
        $category_answer = CategoryAnswer::findOrFail($id);
        $category_answer->delete();
        return redirect()->to('questions');

    }
}
