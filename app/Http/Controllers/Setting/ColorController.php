<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::orderBy('id','asc')->get();
        return view('setting.color.create',compact('colors'));
    }
    public function post(Request $request)
    {
        $request->validate([
            'color_code' => 'required',
        ]);

        Color::insert([
            'color_code' => $request->color_code,
            'created_at' => Carbon::now(),
        ]);
        Toastr::success('Color Setting Add successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = Color::find($id);

        if ($data->status == 0) 
        {
           Color::where('id',$id)->update([
                'status' => 1,
           ]);
           Color::where('id','!=',$id)->update([
                'status' => 0,
           ]);
        } 
        else 
        {
            Color::where('id',$id)->update([
                'status' => 0,
            ]);
            Color::where('id','!=',$id)->update([
                'status' => 1,
           ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
}
