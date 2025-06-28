<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MedicalReport;
use Auth;
use Carbon\Carbon;

use Brian2694\Toastr\Facades\Toastr;
class MedicalReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MedicalReport::latest()->get();
        return view('admin.report.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => '',
            'phone' => '',
            'passport' => 'required|unique:medical_reports',
            'pdf_document' => 'mimes:pdf|required',
        ]);
        // dd($request->all());
        $data = new MedicalReport;
        $data->name = $user_name = $request->name;
        $data->phone = $request->phone;
        $data->passport = $pass = $request->passport;
        if ($request->hasFile('pdf_document')) {
            $file = $request->file('pdf_document');
        
            // Move the uploaded file to a desired location
            $name = $pass.'_reports.pdf';
            $location = public_path('uploads/reports/'); // Adjust the location based on your directory structure
        
            $file->move($location, $name); // Save the file to the specified location with the desired name
        
            // Store the file path in the database
            $data->pdf_document = $name;
        
            $data->save();
            Toastr::success('Document Add successfully :)','Success');
            return back();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'passport' => 'required|unique:medical_reports',
        //     'pdf_document' => 'mimes:pdf|required',
        // ]);
        $data = MedicalReport::find($id);
        $data->name = $user_name = $request->user_name;
        $data->phone = $request->user_phone;
        $data->passport = $pass = $request->user_passport;
        if ($request->hasFile('user_pdf_document')) {
            if ($data->pdf_document) {
                $delete_location = public_path('uploads/reports/'.$data->pdf_document);
                if(file_exists($delete_location)){
                    unlink($delete_location);
                }
                
              }
            $file = $request->file('user_pdf_document');
        
            // Move the uploaded file to a desired location
            $name = $pass.'_reports.pdf';
            $location = public_path('uploads/reports/'); // Adjust the location based on your directory structure
        
            $file->move($location, $name); // Save the file to the specified location with the desired name
        
            // Store the file path in the database
            $data->pdf_document = $name;
            }
            $data->save();
            Toastr::success('Document Updated successfully :)','Success');
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MedicalReport::find($id);
        
        if ($data->pdf_document) {
            $delete_location = public_path('uploads/reports/'.$data->pdf_document);
            
            if (file_exists($delete_location)) {
                unlink($delete_location);
            }
        }

        $data->delete();

        Toastr::success('Document Deleted successfully', 'Success');

        return back();
    }
}
