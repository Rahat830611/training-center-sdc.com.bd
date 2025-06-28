<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FooterSetting;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class FooterController extends Controller
{
     public function index()
    {
        $footers = FooterSetting::orderBy('id','asc')->get();
        return view('setting.footer.create',compact('footers'));
    }
    public function post(Request $request)
    {
        $request->validate([
            'footer_name' => 'required',
            'display' => 'required',
        ]);

        FooterSetting::insert([
            'footer_name' => $request->footer_name,
            'display' => $request->display,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Footer Setting Add successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = FooterSetting::find($id);

        if ($data->display == 'block') 
        {
           FooterSetting::where('id',$id)->update([
                'display' => 'none',
           ]);

           FooterSetting::where('id','!=',$id)->update([
                'display' => 'block',
           ]);
        } 
        else 
        {
            FooterSetting::where('id',$id)->update([
                'display' => 'block',
            ]);

            FooterSetting::where('id','!=',$id)->update([
                'display' => 'none',
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
}
