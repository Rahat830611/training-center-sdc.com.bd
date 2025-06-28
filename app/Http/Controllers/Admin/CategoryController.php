<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Auth;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    public function create()
    {
        $all_category =  Category::orderBy('id','asc')->get();
        return view('admin.category.create',compact('all_category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories',
            'business_type' => 'required',
            'image' => 'mimes:jpg,jpeg,png|required|max:1024',
            'cat_logo' => 'mimes:jpg,jpeg,png|max:1024',
        ]);

        $logo_id = Category::insertGetId([
            'added_by' => Auth::id(),
            'category_name' => $request->category_name,
            'business_type' => $request->business_type,
            'description' => $request->description,
             'description_two' => $request->description_two,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image'))
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/category/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Category::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        if ($request->hasFile('cat_logo'))
        {
            $upload_logo_cat = $request->file('cat_logo');
            $new_upload_logo_cat_name = $logo_id.'.'.$upload_logo_cat->extension();
            $new_logo_cat_location = base_path('public/uploads/category_logo/').$new_upload_logo_cat_name;
            Image::make($upload_logo_cat)->save($new_logo_cat_location);
            Category::find($logo_id)->update([
                'cat_logo' => $new_upload_logo_cat_name,
            ]);
        }

        Toastr::success('Category Add successfully :)','Success');
        return back();

    }

    public function delete($id)
    {
        $data = Category::find($id);
        if(isset($data->image)){
        $image_path = public_path().'uploads/category/'.$data->image;
        unlink("uploads/category/".$data->image);
        }
        if(isset($data->cat_logo)){
        $cat_logo_path = public_path().'uploads/category_logo/'.$data->cat_logo;
        unlink("uploads/category_logo/".$data->cat_logo);
        }
        $data->delete();

        Toastr::success('Category Delete successfully :)','Success');
        return back();
    }
    public function status($id)
    {
        $data = Category::find($id);
        if ($data->status == 0)
        {
           Category::where('id',$id)->update([
                'status' => 1,
           ]);
        }
        else
        {
            Category::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();

    }
    public function edit(Request $request)
    {
        $get_image = Category::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/category/'.$get_image->image);
            unlink($delete_location);
          }

        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/category/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }

        if ($request->hasFile('cat_logo')) {
          if (isset($get_image->cat_logo)) {
            $delete_logo_location = base_path('public/uploads/category_logo/'.$get_image->cat_logo);
            unlink($delete_logo_location);
          }

        $uploaded_logo_photo = $request->file('cat_logo');
        $new_logo_photo_name = $get_image->id.'.'.$uploaded_logo_photo->extension();
        $new_logo_photo_location = base_path('public/uploads/category_logo/'.$new_logo_photo_name);
        Image::make($uploaded_logo_photo)->save($new_logo_photo_location);
        $get_image->cat_logo = $new_logo_photo_name;
        }

        $get_image->category_name = $request->category_name;
        $get_image->business_type = $request->business_type;
        $get_image->description = $request->description;
        $get_image->description_two = $request->description_two;
        $get_image->added_by = Auth::id();
        $get_image->created_at = Carbon::now();
        $get_image->save();

        Toastr::success('Category Update successfully :)','Success');
        return back();
    }
}
