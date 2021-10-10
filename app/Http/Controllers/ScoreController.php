<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function score(Request $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        Score::create($input);
        return response()->json();
    }
}
