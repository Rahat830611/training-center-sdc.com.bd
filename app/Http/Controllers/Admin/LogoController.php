<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Logo;
use Carbon\Carbon;
use Auth;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class LogoController extends Controller
{
    public function create()
    {
        $all_logo =  Logo::orderBy('id','desc')->get();
        return view('admin.logo.create',compact('all_logo'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'mimes:jpg,png|required|max:1024'
        ]);

        $logo_id = Logo::insertGetId([
            'added_by' => Auth::id(),
            'title' => $request->title,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('logo')) 
        {
            $upload_logo_photo = $request->file('logo');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/logo/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Logo::find($logo_id)->update([
                'logo' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Logo Add successfully :)','Success');
        return back();

    }
    
    public function delete($id)
    {
        $data = Logo::find($id);
        $image_path = public_path().'uploads/logo/'.$data->logo;
        unlink("uploads/logo/".$data->logo);   
        $data->delete();

        Toastr::success('Logo Delete successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = Logo::find($id);
        if ($data->status == 0) 
        {
           Logo::where('id',$id)->update([
                'status' => 1,
           ]);
        } 
        else 
        {
            Logo::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
        
    }
    public function edit(Request $request)
    {
        $get_image = Logo::find($request->id);
        $request->all();
        if ($request->hasFile('logo')) {
          if ($get_image->logo != 'logo.png') {
            $delete_location = base_path('public/uploads/logo/'.$get_image->logo);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('logo');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/logo/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->logo = $new_product_photo_name;
        }
        $get_image->added_by = Auth::id();
        $get_image->title = $request->title;
        $get_image->created_at = Carbon::now();
        $get_image->save();
        
        Toastr::success('Logo Update successfully :)','Success');
        return back();
    }
}
