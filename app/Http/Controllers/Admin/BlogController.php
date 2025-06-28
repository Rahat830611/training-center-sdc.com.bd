<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use Auth;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class BlogController extends Controller
{
    public function create()
    {
        return view('admin.blog.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'image' => 'mimes:jpg,jpeg,png|required|max:1024',
        ]);

        $logo_id = Blog::insertGetId([
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'type' => $request->type,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image')) 
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/blog/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Blog::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Blog Add successfully :)','Success');
        return back();

    }
    public function view()
    {
        $all_blogs = Blog::orderBy('id','desc')->get();
        return view('admin.blog.view',compact('all_blogs'));
    }
    public function status($id)
    {
        $data = Blog::find($id);
        if ($data->status == 0) 
        {
           Blog::where('id',$id)->update([
                'status' => 1,
           ]);
        } 
        else 
        {
            Blog::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
    }
    public function delete($id)
    {
        $data = Blog::find($id);
        if ($data->image) {
            $delete_location = base_path('public/uploads/blog/'.$data->image);
            if(file_exists($delete_location)){
                unlink($delete_location);
            }
            
          }  
        $data->delete();

        Toastr::success('Blog Delete successfully :)','Success');
        return back();
    }
    public function edit(Request $request)
    {
        $get_image = Blog::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image) {
            $delete_location = base_path('public/uploads/blog/'.$get_image->image);
            if(file_exists($delete_location)){
                unlink($delete_location);
            }
            
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/blog/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        $get_image->title = $request->title;
        $get_image->short_description = $request->short_description;
        $get_image->description = $request->description;
        $get_image->type = $request->type;
        $get_image->created_at = Carbon::now();
        $get_image->save();
        
        Toastr::success('Blog Update successfully :)','Success');
        return back();
    }
}
