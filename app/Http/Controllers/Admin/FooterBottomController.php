<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\FooterBottom;
use Auth;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class FooterBottomController extends Controller
{
    public function create()
    {
        return view('admin.footerbottom.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'short_description' => 'required',
            'title' => 'required',
            'icon' => 'required',
        ]);

        FooterBottom::insert([
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'title' => $request->title,
            'created_at' => Carbon::now(),
        ]);

       
        Toastr::success('FooterBottom Add successfully :)','Success');
        return back();

    }
    public function view()
    {
        $all_footer = FooterBottom::orderBy('id','desc')->get();
        return view('admin.footerbottom.view',compact('all_footer'));
    }
    public function status($id)
    {
        $data = FooterBottom::find($id);
        if ($data->status == 0) 
        {
           FooterBottom::where('id',$id)->update([
                'status' => 1,
           ]);
        } 
        else 
        {
            Footer::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function delete($id)
    {
        $data = FooterBottom::find($id);  
        $data->delete();

        Toastr::success('Footer Bottom Delete successfully :)','Success');
        return back();
    }
    public function edit(Request $request)
    {
        FooterBottom::where('id',$request->id)->update([
            'icon' => $request->icon,
            'short_description' => $request->short_description,
            'title' => $request->title,
            'created_at' => Carbon::now(),
        ]);
        
        Toastr::success('Footer Update successfully :)','Success');
        return back();
    }
}
