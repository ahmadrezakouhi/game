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

    public function update(Request $request){

        Setting::first()->update($request->all());
        $request->session()->flash('setting','تنظیمات به روز رسانی شد.');
        return redirect('settings');

    }
}
