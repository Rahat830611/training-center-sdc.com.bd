<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Header;
use Auth;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class HeaderController extends Controller
{
    public function create()
    {
        return view('admin.header.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'header_title' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'open' => 'required',
            'close' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|required|max:1024',
        ]);

        $logo_id = Header::insertGetId([
            'added_by' => Auth::id(),
            'header_title' => $request->header_title,
            'top_header_color' => $request->top_header_color,
            'navbar_color' => $request->navbar_color,
            'navscroll_color' => $request->navscroll_color,
            'btn_color' => $request->btn_color,
            'btn_hover_color' => $request->btn_hover_color,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'open' => $request->open,
            'close' => $request->close,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image'))
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/header/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Header::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Header Add successfully :)','Success');
        return back();

    }
    public function view()
    {
        $all_header = Header::orderBy('id','desc')->get();
        return view('admin.header.view',compact('all_header'));
    }
    public function status($id)
    {
        $data = Header::find($id);
        if ($data->status == 0)
        {
           Header::where('id',$id)->update([
                'status' => 1,
           ]);

           Header::where('id','!=',$id)->update([
                'status' => 0,
           ]);
        }
        else
        {
            Header::where('id',$id)->update([
                'status' => 0,
            ]);

            Header::where('id','!=',$id)->update([
                'status' => 1,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function delete($id)
    {
        $data = Header::find($id);
        $image_path = public_path().'uploads/header/'.$data->image;
        unlink("uploads/header/".$data->image);
        $data->delete();

        Toastr::success('Header Delete successfully :)','Success');
        return back();
    }
    public function edit(Request $request)
    {
        $get_image = Header::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/header/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/header/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        // for Favicon
        if ($request->hasFile('favicon')) {
        //   if ($get_image->favicon != 'photo.jpg') {
        //     $delete_location = base_path('public/uploads/header/'.$get_image->favicon);
        //     unlink($delete_location);
        //   }
        $uploaded_favicon_photo = $request->file('favicon');
        $new_favicon_photo_name = time().'.'.$uploaded_favicon_photo->extension();
        $new_favicon_photo_location = base_path('public/uploads/header/'.$new_favicon_photo_name);
        Image::make($uploaded_favicon_photo)->save($new_favicon_photo_location);
        $get_image->favicon = $new_favicon_photo_name;
        }
        $get_image->header_title = $request->header_title;
        $get_image->top_header_color = $request->top_header_color;
        $get_image->navbar_color = $request->navbar_color;
        $get_image->navscroll_color = $request->navscroll_color;
        $get_image->btn_color = $request->btn_color;
        $get_image->btn_hover_color = $request->btn_hover_color;
        $get_image->email = $request->email;
        $get_image->mobile = $request->mobile;
        $get_image->open = $request->open;
        $get_image->close = $request->close;
        $get_image->added_by = Auth::id();
        $get_image->created_at = Carbon::now();
        $get_image->save();

        Toastr::success('Header Update successfully :)','Success');
        return back();
    }
}
