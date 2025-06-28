<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Footer;
use Auth;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class FooterController extends Controller
{
    public function create()
    {
        return view('admin.footer.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'short_description' => '',
            'address' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|required|max:1024',
        ]);

        $logo_id = Footer::insertGetId([
            'added_by' => Auth::id(),
            'short_description' => $request->short_description,
            'address' => $request->address,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'teliphone' => $request->teliphone,
            'facebook' => $request->facebook,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'created_at' => Carbon::now(),
        ]);


        if ($request->hasFile('image'))
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/footer/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Footer::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Footer Add successfully :)','Success');
        return back();

    }
    public function view()
    {
        $all_footer = Footer::orderBy('id','desc')->get();
        return view('admin.footer.view',compact('all_footer'));
    }
    public function status($id)
    {
        $data = Footer::find($id);
        if ($data->status == 0)
        {
           Footer::where('id',$id)->update([
                'status' => 1,
           ]);

           Footer::where('id','!=',$id)->update([
                'status' => 0,
           ]);
        }
        else
        {
            Footer::where('id',$id)->update([
                'status' => 0,
            ]);

            Footer::where('id','!=',$id)->update([
                'status' => 1,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function delete($id)
    {
        $data = Footer::find($id);
        $image_path = public_path().'uploads/footer/'.$data->image;
        unlink("uploads/header/".$data->image);
        $data->delete();

        Toastr::success('Footer Delete successfully :)','Success');
        return back();
    }
    public function edit(Request $request)
    {
        $get_image = Footer::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/footer/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/footer/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        $get_image->short_description = $request->short_description;
        $get_image->address = $request->address;
        $get_image->email = $request->email;
        $get_image->mobile = $request->mobile;
        $get_image->teliphone = $request->teliphone;
        $get_image->facebook = $request->facebook;
        $get_image->whatsapp = $request->whatsapp;
        $get_image->linkedin = $request->linkedin;
        $get_image->youtube = $request->youtube;
        $get_image->footer_bg = $request->footer_bg;
        $get_image->footer_bottom_bg = $request->footer_bottom_bg;
        $get_image->map_url = $request->map_url;
        $get_image->reserved_by = $request->reserved_by;
        $get_image->developed_by = $request->developed_by;
        $get_image->added_by = Auth::id();
        $get_image->created_at = Carbon::now();
        $get_image->save();

        Toastr::success('Footer Update successfully :)','Success');
        return back();
    }
}
