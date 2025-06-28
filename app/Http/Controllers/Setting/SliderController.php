<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SliderSetting;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;


class SliderController extends Controller
{
    public function index()
    {
        $sliders = SliderSetting::orderBy('id','asc')->get();
        return view('setting.slider.create',compact('sliders'));
    }
    public function post(Request $request)
    {
        $request->validate([
            'slider_name' => 'required',
            'display' => 'required',
        ]);

        SliderSetting::insert([
            'slider_name' => $request->slider_name,
            'display' => $request->display,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Slider Setting Add successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = SliderSetting::find($id);

        if ($data->display == 'block') 
        {
           SliderSetting::where('id',$id)->update([
                'display' => 'none',
           ]);

           // SliderSetting::where('id','!=',$id)->update([
           //      'display' => 'block',
           // ]);
        } 
        else 
        {
            SliderSetting::where('id',$id)->update([
                'display' => 'block',
            ]);

            // SliderSetting::where('id','!=',$id)->update([
            //     'display' => 'none',
            // ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
}
