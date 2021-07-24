<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index(){
        $settings = Setting::all();
        return view('admin.settings.index',compact('settings'));
    }

    public function create(){
        return view('admin.settings.create');
    }

    public function store(Request $request){

       $data = new Setting();
            $data->phone=$request->phone;
            $data->email=$request->email;
            $data->address=$request->address;
            $data->social_media=$request->social_media;
            $data->save();
            return redirect('admin/settings');
    }

    public function edit($id){
        $setting = Setting::findOrFail($id);
        return view('admin.settings.edit',compact('setting'));
    }

    public function update(Request $request,$id){
        $setting = Setting::findOrFail($id);

        $setting->phone=$request->phone;
        $setting->email=$request->email;
        $setting->address=$request->address;
        $setting->social_media=$request->social_media;
        $setting->save();
        return redirect('admin/settings');

    }
}
