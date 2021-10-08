<?php

namespace App\Http\Controllers;

use App\Estimate;
use Illuminate\Http\Request;

class EstimateController extends Controller
{
    public function estimate(Request $request)
    {
        $input = $request->all();
        $input['user_id']=auth()->user()->id;
        Estimate::create($input);
        return response()->json();
    }
}
