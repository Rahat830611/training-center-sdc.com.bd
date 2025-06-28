<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Team;
use Auth;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class OurTeamController extends Controller
{
    public function create()
    {
        return view('admin.team.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|required|max:1024',
        ]);

        $logo_id = Team::insertGetId([
            'name' => $request->name,
            'designation' => $request->designation,
            'description' => $request->description,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('image')) 
        {
            $upload_logo_photo = $request->file('image');
            $new_upload_logo_photo_name = $logo_id.'.'.$upload_logo_photo->extension();
            $new_logo_photo_location = base_path('public/uploads/team/').$new_upload_logo_photo_name;
            Image::make($upload_logo_photo)->save($new_logo_photo_location);
            Team::find($logo_id)->update([
                'image' => $new_upload_logo_photo_name,
            ]);
        }

        Toastr::success('Team Add successfully :)','Success');
        return back();

    }
    public function view()
    {
        $all_member = Team::orderBy('id','desc')->get();
        return view('admin.team.view',compact('all_member'));
    }
    public function status($id)
    {
        $data = Team::find($id);
        if ($data->status == 0) 
        {
           Team::where('id',$id)->update([
                'status' => 1,
           ]);
        } 
        else 
        {
            Team::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function delete($id)
    {
        $data = Team::find($id);
        $image_path = public_path().'uploads/team/'.$data->image;
        unlink("uploads/team/".$data->image);   
        $data->delete();

        Toastr::success('Team Delete successfully :)','Success');
        return back();
    }
    public function edit(Request $request)
    {
        $get_image = Team::find($request->id);
        $request->all();
        if ($request->hasFile('image')) {
          if ($get_image->image != 'photo.jpg') {
            $delete_location = base_path('public/uploads/team/'.$get_image->image);
            unlink($delete_location);
          }
        $uploaded_product_photo = $request->file('image');
        $new_product_photo_name = $get_image->id.'.'.$uploaded_product_photo->extension();
        $new_product_photo_location = base_path('public/uploads/team/'.$new_product_photo_name);
        Image::make($uploaded_product_photo)->save($new_product_photo_location);
        $get_image->image = $new_product_photo_name;
        }
        $get_image->name = $request->name;
        $get_image->designation = $request->designation;
        $get_image->description = $request->description;
        $get_image->created_at = Carbon::now();
        $get_image->save();
        
        Toastr::success('Team Update successfully :)','Success');
        return back();
    }
}
