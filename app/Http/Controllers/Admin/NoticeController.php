<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notice;
use Image;
use Brian2694\Toastr\Facades\Toastr;

class NoticeController extends Controller
{
     public function create()
    {
        $all_notice = Notice::orderBy('id','desc')->get();
       
        return view('admin.notice.index', compact('all_notice'));
    }
    
   
    public function store(Request $request)
    {
        $request->validate([
            'notice_title' => 'required',
            'notice_type' => 'required',
            'pdf_document' => 'mimes:pdf|required',
        ]);
        // dd($request->all());
        $data = new Notice;
        $data->notice_title = $request->notice_title;
        $data->notice_type = $request->notice_type;
        if ($request->hasFile('pdf_document')) {
            $file = $request->file('pdf_document');
        
            // Move the uploaded file to a desired location
            $name =time().'_notice.pdf';
            $location = public_path('uploads/notice/'); // Adjust the location based on your directory structure
        
            $file->move($location, $name); // Save the file to the specified location with the desired name
        
            // Store the file path in the database
            $data->pdf_document = $name;
        
            $data->save();
            Toastr::success('Document Add successfully :)','Success');
            return back();

        }
    }
   
    public function edit(Request $request, $id)
    {
     
        $data = Notice::find($id);
        $data->notice_title = $request->notice_title;
        $data->notice_type = $request->notice_type;

        if ($request->hasFile('pdf_document')) {
            if ($data->pdf_document) {
                $delete_location = public_path('uploads/notice/'.$data->pdf_document);
                if(file_exists($delete_location)){
                    unlink($delete_location);
                }
                
              }
            $file = $request->file('pdf_document');
        
            // Move the uploaded file to a desired location
            $name = time().'_notice.pdf';
            $location = public_path('uploads/notice/'); // Adjust the location based on your directory structure
        
            $file->move($location, $name); // Save the file to the specified location with the desired name
        
            // Store the file path in the database
            $data->pdf_document = $name;
            }
            $data->save();
            Toastr::success('Notice Updated successfully :)','Success');
            return back();
    }
    
  
   
    public function status($id)
    {
        $data = Notice::find($id);
        if ($data->status == 0) 
        {
           Notice::where('id',$id)->update([
                'status' => 1,
           ]);
        } 
        else 
        {
            Notice::where('id',$id)->update([
                'status' => 0,
            ]);
        }

        Toastr::success('Status Change successfully :)','Success');
        return back();
    }
    
    public function delete($id)
    {
        $data = Notice::find($id);
        
        if ($data->pdf_document) {
            $delete_location = public_path('uploads/notice/'.$data->pdf_document);
            
            if (file_exists($delete_location)) {
                unlink($delete_location);
            }
        }

        $data->delete();

       Toastr::success('Notice Delete successfully :)','Success');
        return back();
    }
        
    
}
