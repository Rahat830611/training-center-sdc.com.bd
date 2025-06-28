<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Aboutus;
use Image;
use Carbon\Carbon;
use Brian2694\Toastr\Facades\Toastr;

class AboutusController extends Controller
{
    public function create()
    {
        return view('admin.aboutus.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
             
        ]);
 
    
        $logo_id = Aboutus::insertGetId([
            'description_one' => $request->description_one,
            'description_two' => $request->description_two,
            'created_at' => Carbon::now(),
        ]);
        if ($request->hasFile('image')) 
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/aboutus/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Aboutus::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }
       Toastr::success('Content Add successfully :)','Success');
        return back();
    }
    public function view()
    {
        $datas = Aboutus::where('id',5)->get();
        return view('admin.aboutus.view',compact('datas'));
    }
    public function show($id)
    {
        $data =  Aboutus::find($id);

        return view('admin.aboutus.edit',compact('data'));
    }
    public function edit(Request $request)
    {
        // Aboutus::where('id',$request->id)->update([
        //     'content' => $request->content,
        // ]);
        $get_image = Aboutus::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
        //   if ($get_image->image != 'photo.jpg') {
        //     $delete_location = base_path('public/uploads/aboutus/'.$get_image->image);
        //     unlink($delete_location);
        //   }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/aboutus/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        
        $get_image->description_one = $request->description_one;
        $get_image->description_two = $request->description_two;
        
        if ($request->hasFile('client_bg_img')) {
          if ($get_image->client_bg_img != 'photo.jpg') {
            $delete_location = base_path('public/uploads/aboutus/'.$get_image->client_bg_img);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('client_bg_img');
        $new_product_photo_name = time().'.'.$get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/aboutus/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->client_bg_img = $new_product_photo_name;
        }
        $get_image->bg_color = $request->bg_color;
        $get_image->feature1_icon = $request->feature1_icon;
        $get_image->feature1_title = $request->feature1_title;
        $get_image->feature1_description = $request->feature1_description;
        $get_image->feature2_icon = $request->feature2_icon;
        $get_image->feature2_title = $request->feature2_title;
        $get_image->feature2_description = $request->feature2_description;
        $get_image->feature3_icon = $request->feature3_icon;
        $get_image->feature3_title = $request->feature3_title;
        $get_image->feature3_description = $request->feature3_description;
        
        
        $get_image->client_title = $request->client_title;
        $get_image->client_description = $request->client_description;
        
        
        $get_image->created_at = Carbon::now();
        $get_image->save();
        Toastr::success('Content Update successfully :)','Success');
        return back();
    }
        public function message_create()
    {
        return view('admin.message.create');
    }
    public function message_store(Request $request)
    {
        $this->validate($request, [
             'content' => 'required',
        ]);
        $logo_id = Aboutus::insert([
            'content' => $request->content,
            'created_at' => Carbon::now(),
        ]);
       Toastr::success('Message Add successfully :)','Success');
        return back();
    }
    public function message_view()
    {
        $datas = Aboutus::where('content','!=',null)->get();
        return view('admin.message.view',compact('datas'));
    }
    public function message_edit($id)
    {
        $data =  Aboutus::find($id);

        return view('admin.message.edit',compact('data'));
    }
    public function message_update(Request $request)
    {
        Aboutus::where('id',$request->id)->update([
            'content' => $request->content,
        ]);
        
        Toastr::success('Content Update successfully :)','Success');
        return back();
    }
}
