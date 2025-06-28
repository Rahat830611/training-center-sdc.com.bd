<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HeaderSetting;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class HeaderController extends Controller
{
    public function index()
    {
        $headers = HeaderSetting::orderBy('id','asc')->get();
        return view('setting.header.create',compact('headers'));
    }
    public function post(Request $request)
    {
        $request->validate([
            'header_name' => 'required',
            'display' => 'required',
        ]);

        HeaderSetting::insert([
            'header_name' => $request->header_name,
            'display' => $request->display,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Header Setting Add successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = HeaderSetting::find($id);

        if ($data->display == 'block') 
        {
           HeaderSetting::where('id',$id)->update([
                'display' => 'none',
           ]);

           HeaderSetting::where('id','!=',$id)->update([
                'display' => 'block',
           ]);
        } 
        else 
        {
            HeaderSetting::where('id',$id)->update([
                'display' => 'block',
            ]);

            HeaderSetting::where('id','!=',$id)->update([
                'display' => 'none',
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
}
