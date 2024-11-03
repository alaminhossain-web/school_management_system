<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::latest()->first();
        return view('admin.setting.index',compact('setting'));
    }
    public function logo_setting(Request $request)
    {
        Setting::createOrUpdateLogo($request);
        return redirect()->back()->with('success', 'Logo and Favicon updated successfully!');
    }
    public function general_setting(Request $request)
    {
        Setting::createOrUpdateGeneral($request);
        return redirect()->back()->with('success', 'General Setting updated successfully!');
    }
    public function chairman_setting(Request $request)
    {
        Setting::createOrUpdateChairman($request);
        return redirect()->back()->with('success', 'Chairman Setting updated successfully!');
    }
    public function social_setting(Request $request)
    {
        Setting::createOrUpdateSocial($request);
        return redirect()->back()->with('success', 'Social Setting updated successfully!');
    }
}
