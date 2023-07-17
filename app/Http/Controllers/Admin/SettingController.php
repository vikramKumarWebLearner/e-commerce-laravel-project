<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        if($setting != null){
            return view('admin.setting.index',compact('setting'));
        }
        else{
             echo 'No Data found';
        }
       
    }

    public function store(Request $request)
    {
       $setting = Setting::first();

       if($setting) {
        
        $setting->update([
            'website_name' => $request->website_name,
            'website_url'=> $request->website_url,
            'page_title'=> $request->page_title,
            'meta_keyword'=> $request->meta_keyword,
            'meta_desc'=> $request->meta_desc,
            'address'=> $request->address,
            'phone_1'=> $request->phone_1,
            'phone_2'=> $request->phone_2,
            'email_1'=> $request->email_1,
            'email_2'=> $request->email_2,
            'facbook'=> $request->facebook,
            'twitter'=> $request->twitter,
            'instagram'=> $request->instagram,
            'youtube' => $request->youtube
       ]);
       return redirect()->back()->with('message', 'Setting Saved');
       }else {
           Setting::create([
                'website_name' => $request->website_name,
                'website_url'=> $request->website_url,
                'page_title'=> $request->page_title,
                'meta_keyword'=> $request->meta_keyword,
                'meta_desc'=> $request->meta_desc,
                'address'=> $request->address,
                'phone_1'=> $request->phone_1,
                'phone_2'=> $request->phone_2,
                'email_1'=> $request->email_1,
                'email_2'=> $request->email_2,
                'facebook'=> $request->facebook,
                'twitter'=> $request->twitter,
                'instagram'=> $request->instagram,
                'youtube' => $request->youtube,
           ]);

           return redirect()->back()->with('message', 'Setting Saved');
       }
        
    }
}
