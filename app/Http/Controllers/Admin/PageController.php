<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Page;
use Image;
use Auth;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class PageController extends Controller
{
    public function create()
    {
        return view('admin.page.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
             'description' => 'required',
             'description_two' =>'',
             'page_name' =>'required',
             'image' => 'mimes:jpg,jpeg,png|max:1024',
        ]);
 
    
        $page_id = Page::insertGetId([
            'page_name' => $request->page_name,
            'description' => $request->description,
            'description_two' => $request->description_two,
        ]);

        if ($request->hasFile('image')) 
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $page_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/page/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Page::find($page_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

       Toastr::success('Page Create successfully :)','Success');
        return back();
    }
    public function view()
    {
        $datas = Page::orderBy('id','desc')->get();
        return view('admin.page.view',compact('datas'));
    }

    public function delete($id)
    {
        $data = Page::find($id);
        if (file_exists( public_path().'/uploads/page/'.$data->image)) {
            $image_path = public_path().'uploads/page/'.$data->image;  
            unlink("uploads/page/".$data->image);
        }
        $data->delete();

        Toastr::success('Category Delete successfully :)','Success');
        return back();
    }

    public function show($id)
    {
        $data =  Page::find($id);
        return view('admin.page.edit',compact('data'));
    }
    public function edit(Request $request)
    {
        $get_image = Page::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/page/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/page/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        
        $get_image->page_name = $request->page_name;
        $get_image->description = $request->description;
        $get_image->description_two = $request->description_two;
        $get_image->save();

        Toastr::success('Page Update successfully :)','Success');
        return back();
    }
}
