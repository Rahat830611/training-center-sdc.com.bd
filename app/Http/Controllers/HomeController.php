<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\FileUpload;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function append()
    {
        return view('admin.append.create');
    }
    public function downloadFile()
    {
        $file = FileUpload::where('status',1)->first();
        // $myFile = storage_path("folder/news.pdf");
        $myFile = public_path("uploads/file/").$file->file;
        return response()->download($myFile);
    }
   
}
