<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class SliderController extends Controller
{
    public function create()
    {
        $all_slider =  Slider::orderBy('id','desc')->get();
        return view('admin.slider.create',compact('all_slider'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpg,jpeg,png|required|max:1024'
        ]);

        $logo_id = Slider::insertGetId([
            'title' => $request->title,
            'button' => $request->button,
            'paragraph' => $request->paragraph,
            'url' => $request->url,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image')) 
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/slider/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->resize(1200,608)->save($new_logo_photo_location);
            Slider::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Slider Add successfully :)','Success');
        return back();

    }
    
    public function delete($id)
    {
        $data = Slider::find($id);
        $image_path = public_path().'uploads/slider/'.$data->image;
        unlink("uploads/slider/".$data->image);   
        $data->delete();

        Toastr::success('Slider Delete successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = Slider::find($id);
        if ($data->status == 0) 
        {
           Slider::where('id',$id)->update([
                'status' => 1,
           ]);
        } 
        else 
        {
            Slider::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
        
    }
    public function edit(Request $request)
    {
        $get_image = Slider::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/slider/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/slider/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        $get_image->title = $request->title;
        $get_image->paragraph = $request->paragraph;
        $get_image->button = $request->button;
        $get_image->url = $request->url;
        $get_image->created_at = Carbon::now();
        $get_image->save();
        
        Toastr::success('Slider Update successfully :)','Success');
        return back();
    }
}
