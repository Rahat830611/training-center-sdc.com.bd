<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery;
use Auth;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class GalleryController extends Controller
{
    public function create()
    {
        return view('admin.gallery.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:png,jpg,jpeg|max:1024',
        ]);
        $logo_id = Gallery::insertGetId([
            'type' => 'photo',
            'title' => $request->title,
            'video' => $request->video,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image')) 
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/gallery/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Gallery::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Gallery Add successfully :)','Success');
        return back();

    }
     public function edit(Request $request, $id)
    {
        
        $gallery = Gallery::find($id);
        $gallery->type = 'photo';
        $gallery->title = $request->title;
        
        if ($request->hasFile('image')) {
          if ($gallery->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/gallery/'.$gallery->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = time().'.'.$gallery->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/gallery/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $gallery->image = $new_product_photo_name;
        }
        $gallery->save();
        
        Toastr::success('Gallery Add successfully :)','Success');
        return back();

    }
    
    public function view()
    {
        $all_photo = Gallery::where('type','photo')->get();
        return view('admin.gallery.view',compact('all_photo'));
    }
    public function video()
    {
        $all_video = Gallery::where('type','video')->get();
        return view('admin.gallery.video',compact('all_video'));
    }
    public function status($id)
    {
        $data = Gallery::find($id);
        if ($data->status == 0) 
        {
           Gallery::where('id',$id)->update([
                'status' => 1,
           ]);
        } 
        else 
        {
            Gallery::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function delete($id)
    {
        $data = Gallery::find($id);
        $data->delete();

        Toastr::success('Gallery Delete successfully :)','Success');
        return back();
    }
}
