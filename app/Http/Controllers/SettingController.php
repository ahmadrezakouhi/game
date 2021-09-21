<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function edit()
    {

        $setting = Setting::all();
        return view('settings.setting',compact('setting'));
    }

   
}
