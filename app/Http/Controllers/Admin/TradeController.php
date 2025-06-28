<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

use Brian2694\Toastr\Facades\Toastr;
use App\Trade;
use App\Category;
use Illuminate\Support\Str;
use PDF;
class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Trade::latest()->get();
        return view('admin.trade.index', compact('data'));
    }


    public function create()
    {
        $all_category = Category::where('status',0)->orderBy('id','asc')->get();
        return view('admin.trade.add-edit', compact('all_category'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string',
            // 'gender' => 'required',
            // 'bn_registration_no' => 'required',
            // 'passport_no' => 'required',
            // 'passport_issue_date' => 'required',
            // 'passport_expirary_date' => 'required',
            
            // 'document_issues' => 'required',
            'phone' => ['required','regex:/(\+){0,1}(88){0,1}01(3|4|5|6|7|8|9)(\d){8}/','min:11','max:15', 'unique:trades'],
            // 'address' => 'required',
            
        ]);
        
        $latest_trade = Trade::orderby('id', 'desc')->first();
        
        $latest_registration_no = $latest_trade ? (int)$latest_trade->register_no : 0;
        $new_registration_no = str_pad($latest_registration_no + 1, 6, '0', STR_PAD_LEFT);
        $current_year = date('Y');
        $new_certificate_no = 'C-' . $new_registration_no . '/' . $current_year;

        
        $data = new Trade;
        $data->trade_course = implode(",", $request->trade_course);
        // $data->trade_course = $request->trade_course; 
        $data->position_name = $request->position_name ?? '';
        $data->name = $request->name;
        $data->worker_type = $request->worker_type;
        $data->gender = $request->gender;
        $data->nationality = $request->nationality;
        $data->dob = $request->dob;
        $data->bn_registration_no = $request->bn_registration_no;
        $data->passport_no = $request->passport_no;
        $data->document_issues = $request->document_issues;
        $data->passport_issue_date = $request->passport_issue_date;
        $data->passport_expirary_date = $request->passport_expirary_date;
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->phone = $request->phone;
        $data->zip_code = $request->zip_code;
        $data->address = $request->address;
        // $data->created_at = $request->created_at ?? Carbon::now();
        $data->training_start_date = $request->training_start_date;
        $data->training_end_date = $request->training_end_date;
        $data->register_no = $new_registration_no;
        $data->certificate_no = $new_certificate_no;
        $data->save();
        if ($request->hasFile('uploadfile')) {
            $file = $request->file('uploadfile');
        
            // Move the uploaded file to a desired location
            
            $extension = $file->getClientOriginalExtension();
            $type = $extension == 'pdf' ? 'pdf' : 'image';
            $name = uniqid().'_'.$data->id.'_certificate.'.$extension;
            $location = public_path('uploads/candidate/'); // Adjust the location based on your directory structure
        
            $file->move($location, $name); // Save the file to the specified location with the desired name
        
            // Store the file path in the database
            // $data->uploadfile = $name;
            Trade::find($data->id)->update([
                'file_name' => $name,
                'file_type'  => $type
            ]);
        }
        $tradedata =  Trade::find($data->id);
        // return view('admin.trade.downloadfile',compact('tradedata'));
        return back()->with('success','Information Stored Successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Trade::find($id);
        $all_category = Category::where('status',0)->orderBy('id','asc')->get();
        return view('admin.trade.add-edit', compact('data', 'all_category'));
    }
    public function show($id){
        $data = Trade::find($id);
        return view('admin.trade.view', compact('data'));
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
        // dd($request->all());
        $data = $tradedata = Trade::find($id);
        $data->trade_course = implode(",", $request->trade_course);
        $data->position_name = $request->position_name ?? '';
        $data->name = $request->name;
        $data->worker_type = $request->worker_type;
        $data->gender = $request->gender;
        $data->nationality = $request->nationality;
        $data->dob = $request->dob; 
        $data->bn_registration_no = $request->bn_registration_no;
        $data->passport_no = $request->passport_no;
        $data->document_issues = $request->document_issues;
        $data->passport_issue_date = $request->passport_issue_date;
        $data->passport_expirary_date = $request->passport_expirary_date;
        $data->father_name = $request->father_name;
        $data->mother_name = $request->mother_name;
        $data->phone = $request->phone;
        $data->zip_code = $request->zip_code;
        $data->address = $request->address;
        // $data->register_no = $request->register_no;
        // $data->certificate_no = $request->certificate_no;
        $data->updated_at = Carbon::now();
        // $data->created_at = $request->created_at ?? $data->created_at;
        $data->training_start_date = $request->training_start_date;
        $data->training_end_date = $request->training_end_date;
        $data->training_status = $request->training_status;
        if ($request->hasFile('uploadfile')) {
            $file = $request->file('uploadfile');
    
            // Determine the file type
            $extension = $file->getClientOriginalExtension();
            $type = $extension == 'pdf' ? 'pdf' : 'image';
    
            // Move the uploaded file to a desired location
            $name = uniqid() .'_'. $data->id . '_certificate.' . $extension;
            $location = public_path('uploads/candidate/');
    
            $file->move($location, $name);
    
            // Delete the old file if it exists
            if ($data->file_name) {
                $oldFilePath = $location . $data->file_name;
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
    
            // Update the file path and type in the database
            $data->file_name = $name;
            $data->file_type = $type;
        }
        $data->save();
        Toastr::success('Info Updated successfully :)','Success');
            // return back();
        // return view('admin.trade.downloadfile',compact('tradedata'));
        return redirect()->route('downloadfile', $id);
    }

    public function downloadview($id){
        $data = Trade::find($id);
        // $pdf = PDF::loadView('admin.trade.downloadfile', $tradedata)
        //     ->setPaper('a4', 'landscape');
        return view('admin.trade.downloadfile',compact('data'));
        // return $pdf->download('prof.pdf');
        // try {
        //     $data = Trade::find($id);
    
        //     if ($data) {
        //         $html = view('admin.trade.downloadfile', compact('data'))->render();

        //         // $pdf = PDF::loadView('admin.trade.downloadfile', compact('data'))
        //         //     ->setPaper('a4', 'landscape');
        //         // return $pdf->download('prof.pdf');
        //         $pdf = PDF::loadHTML($html)
        //     ->setPaper('a4', 'landscape');

        // return $pdf->stream();
        //     } else {
        //         return response()->json(['error' => 'Trade not found'], 404);
        //     }
        // } catch (Exception $e) {
        //     // Log the exception for debugging
        //     Log::error($e->getMessage());
        //     return response()->json(['error' => 'Internal Server Error'], 500);
        // }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Trade::find($id);
        $data->delete();

        Toastr::success('Data Deleted successfully', 'Success');

        return back();
    }
    public function tradesinfoByDateInterval(Request $request){
        if ($request->get('to_date') && $request->get('to_date')) {
            $data = Trade::whereBetween('created_at', array(Carbon::parse($request->from_date)->startOfDay(), Carbon::parse($request->to_date)->endOfDay()))->get();
            return view('admin.trade.index', compact('data'));
        }
    }
    public function tradesinfoByDate(Request $request, $date)
    {
        
        if($date == 'today')
        {
            $today = date('Y-m-d');
            $sales =  Trade::where('created_at', '>=', $today.' 00:00:00')
            ->where('created_at', '<=', $today.' 23:59:59')
            ->latest()->get();

            return view('admin.trade.index',[
                'date' => 'Today', 
                'data'=>$sales
            ]);
        }
        elseif($date == 'yesterday')
        {
            $yesterday = date('Y-m-d',strtotime("-1 days"));
            $sales =  Trade::where('created_at', '>=', $yesterday.' 00:00:00')
            ->where('created_at', '<=', $yesterday.' 23:59:59')
            ->latest()->get();
            return view('admin.trade.index',[
                'date' => 'Yesterday', 
                'data'=>$sales
            ]);
        }
        elseif($date == 7)
        {
            $from = date('Y-m-d',strtotime("-6 days"));
            $to = date('Y-m-d');

            $sales =  Trade::where('created_at', '>=', $from.' 00:00:00')
            ->where('created_at', '<=', $to.' 23:59:59')
            ->latest()->get();

            
            return view('admin.trade.index',[
                'date' => 'Last 7 Days', 
                'data'=>$sales
            ]);
        }

        elseif($date == 30)
        {
            $from = date('Y-m-d',strtotime("-29 days"));
            $to = date('Y-m-d');

            $sales =  Trade::where('created_at', '>=', $from.' 00:00:00')
            ->where('created_at', '<=', $to.' 23:59:59')
            ->latest()->get();

            return view('admin.trade.index',[
                'date' => 'Last 30 Days', 
                'data'=>$sales
            ]);
        }
        elseif($date == 'this_month')
        {
            $date = date('Y-m');
            $sales =  Trade::where('created_at', '>=', $date.'-1 00:00:00')
            ->where('created_at', '<=', $date.'-31 23:59:59')
            ->latest()->get();

            return view('admin.trade.index',[
                'date' => 'This Month', 
                'data'=>$sales
            ]);
        }
        else
        {
            $from =  date("Y-n-j", strtotime("first day of previous month"));
            $to = date("Y-n-j", strtotime("last day of previous month"));

            $sales =  Trade::where('created_at', '>=', $from.' 00:00:00')
            ->where('created_at', '<=', $to.' 23:59:59')
            ->latest()->get();

            return view('admin.trade.index',[
                'date' => 'Last Month', 
                'data'=>$sales
            ]);
        }
    }
    public function tradesinfoByuser(Request $request){
         $userids = $request->package_id;
        
            $date = date("Y-m-d");
            $filename = $date.'.csv';
            $data = array();
            $title = ['SL NO.','Name','Course','Worker Type', 'Gender', 'Passport Number','Passport Date limit', 'Phone No','Created Date'];
            array_push($data, $title);
            $i= 1;
             foreach ($userids as $userId) {
                $info = Trade::find($userId);
                $phoneNumber = $info->phone;
                if (!Str::startsWith($phoneNumber, '88')) {
                    $phoneNumber = '88' . $phoneNumber;
                }
                $gender = $info->gender ?? '';
                $name = $info->name;
                $passport = $info->passport_no ?? '';
                $course = $info->course->category_name ?? '';
                $workertype = $info->worker_type ?? '';
                
                if($info->passport_issue_date && $info->passport_expirary_date){
                    $datelimit = $info->passport_issue_date .' to '. $info->passport_expirary_date;
                }else{
                    $datelimit = '';
                }
                $createddate = $info->created_at->format('Y-m-d');
                array_push($data, array(
           		   $i++, $name,$course,$workertype, $gender,$passport, $datelimit, $phoneNumber, $createddate
           		));
             }
            $filecontent = implode(PHP_EOL, array_map(function($row) {
                return implode(',', $row);
            }, $data));
            
            return response($filecontent)
                ->header('Content-Type', 'text/csv')
                ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
        
       
    
    }
}
