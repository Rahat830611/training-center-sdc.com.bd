<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CategoryDescription;
use App\Category;
use Auth;
use Carbon\Carbon;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class CategoryDescriptionController extends Controller
{
    public function create()
    {
        $all_category =  Category::where('status',0)->get();
        return view('admin.cat_desc.create',compact('all_category'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'category_descriptions' => 'required',
        ]);

        CategoryDescription::create([
            'category_id' => $request->category_id,
            'category_descriptions' => $request->category_descriptions,
            'created_at' => Carbon::now(),
        ]);

        Toastr::success('Category Description Add successfully :)','Success');
        return back();

    }
    public function view()
    {
        $all_data = CategoryDescription::orderBy('id','desc')->get();
        return view('admin.cat_desc.view',compact('all_data'));
    }
    public function status($id)
    {
        $data = CategoryDescription::find($id);
        if ($data->status == 0) 
        {
           CategoryDescription::where('id',$id)->update([
                'status' => 1,
           ]);
        } 
        else 
        {
            CategoryDescription::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    public function show($id)
    {
        $data = CategoryDescription::find($id);
        $all_category =  Category::where('status',0)->get();
        return view('admin.cat_desc.edit',compact('data','all_category'));
    }
    public function delete($id)
    {
        $data = CategoryDescription::find($id); 
        $data->delete();

        Toastr::success('Category Description Delete successfully :)','Success');
        return back();
    }
    public function edit(Request $request)
    {
        CategoryDescription::where('id',$request->id)->update([
            'category_id' => $request->category_id,
            'category_descriptions' => $request->category_descriptions,
            'created_at' => Carbon::now(),
        ]);
        
        Toastr::success('Blog Update successfully :)','Success');
        return back();
    }
}
