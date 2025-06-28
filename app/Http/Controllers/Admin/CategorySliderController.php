<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategorySlider;
use App\Category;
use Auth;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class CategorySliderController extends Controller
{
    public function create()
    {
        $all_category =  Category::where('status',0)->get();
        return view('admin.cat_slider.create',compact('all_category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'image' => 'mimes:jpg,jpeg,png|required|max:1024',
        ]);

        $logo_id = CategorySlider::insertGetId([
            'category_id' => $request->category_id,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image')) 
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/category_slider/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            CategorySlider::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Category Slider Add successfully :)','Success');
        return back();

    }
    public function view()
    {
        $all_data = CategorySlider::orderBy('id','desc')->get();
        return view('admin.cat_slider.view',compact('all_data'));
    }
    public function status($id)
    {
        $data = CategorySlider::find($id);
        if ($data->status == 0) 
        {
           CategorySlider::where('id',$id)->update([
                'status' => 1,
           ]);
        } 
        else 
        {
            CategorySlider::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function show($id)
    {
        $data = CategorySlider::find($id);
        $all_category =  Category::where('status',0)->get();
        return view('admin.cat_slider.edit',compact('data','all_category'));
    }
    public function delete($id)
    {
        $data = CategorySlider::find($id); 
        $image = base_path('public/uploads/category_slider/'.$data->image);;

        if ($image) {
            unlink($image);
            $data->delete();
        }
        else
        {
            $data->delete();
        }

        Toastr::success('Category Slider Delete successfully :)','Success');
        return back();
    }
    public function edit(Request $request)
    {
        $get_image = CategorySlider::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/category_slider/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/category_slider/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        $get_image->category_id = $request->category_id;
        $get_image->created_at = Carbon::now();
        $get_image->save();
        
        Toastr::success('Category Slider Update successfully :)','Success');
        return back();
    }
}
