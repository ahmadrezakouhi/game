<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function edit()
    {

        $setting = Setting::first();
        return view('settings.setting', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::first();
        if ($setting) {
            Setting::first()->update($request->all());
        } else {
            Setting::create($request->all());
        }
        $request->session()->flash('settings', 'تنظیمات به روز رسانی شد.');
        return redirect('settings');
    }
}
