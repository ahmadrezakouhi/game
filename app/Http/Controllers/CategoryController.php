<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request){
        Category::create([
            'name'=>$request->get('name')
        ]);

        return redirect()->to('questions');
    }

    public function destroy($id){
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect()->to('questions');
    }

}
