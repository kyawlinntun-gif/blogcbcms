<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.settings', [
            'settings' => Setting::first()
        ]);
    }

    public function update(Setting $setting, Request $request)
    {
        $setting->update(['site_name' => $request->site_name, 'address' => $request->address, 'contact_phone' => $request->contact_phone, 'contact_email' => $request->contact_email]);
        Session::flash('success', 'Settings updated!');
        return redirect()->back();
    }
}
