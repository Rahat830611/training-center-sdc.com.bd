<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\CategoryDescription;
use App\CategorySlider;
use App\SubCategory;
use App\ChildCategory;
use App\Team;
use App\Product;
use App\Slider;
use App\Page;
use App\Logo;
use App\Header;
use App\FooterBottom;
use App\SliderSetting;
use App\Gallery;
use App\Aboutus;
use App\Notice;
use Mail;
use App\Message;
use App\Color;
use App\Blog;
use App\Trade;
use App\MedicalReport;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        $all_category = Category::where('status',0)->orderBy('id','asc')->get();
        $all_subcategory = SubCategory::where('status',0)->orderBy('id','asc')->get();
        $all_product = Product::where('status',0)->orderBy('id','asc')->get();
        $all_slider = Slider::where('status',0)->orderBy('id','asc')->get();
        $aboutus = Page::where('page_name','About Us')->first();
        $datas = Aboutus::where('id',5)->first();
        $all_photo = Gallery::where('type','photo')->get();
        $all_brands = Logo::where('status',0)->orderBy('id','asc')->get();
        $with_sidebar = SliderSetting::where('id',1)->first();
        $without_sidebar = SliderSetting::where('id',2)->first();
        $footer_bottom = FooterBottom::where('status',0)->take(4)->get();
        $teams = Team::where('status',0)->orderBy('id','desc')->get();
        $blog = Blog::where('status',0)->orderBy('id','asc')->get();
        $color = Color::where('status',0)->first();
        $all_knit = Product::where('status',0)->where('category_id',14)->orderBy('id','desc')->get();
        $all_woven = Product::where('status',0)->where('category_id',15)->orderBy('id','desc')->get();
        $all_sweater = Product::where('status',0)->where('category_id',16)->orderBy('id','desc')->get();
        return view('frontend.index',compact('all_category','all_slider','aboutus','all_brands','all_photo','all_product','with_sidebar','without_sidebar','footer_bottom','all_subcategory','teams','color','datas','all_knit','all_woven','all_sweater','blog'));
    }

    public function products($id)
    {
        $category =  Category::find($id);
        $subcategory =  SubCategory::find($id);
        $childCategory =  ChildCategory::find($id);

        if($category){
            $products = Product::where('category_id',$category->id)->where('status',0)->get();
        }
        if($subcategory){
            $products = Product::where('subcategory_id',$subcategory->id)->where('status',0)->paginate(20);
        }
        if($childCategory){
            $products = Product::where('childcategory_id',$childCategory->id)->where('status',0)->get();
        }

        // $products = Product::where('category_id',$category->id)->orWhere('subcategory_id',$subcategory->id)->orWhere('childcategory_id',$childCategory->id)->where('status',0)->get();
        // $products = Product::where('category_id',$category->id)->where('status',0)->get();
        // dd($products);
        $color = Color::where('status',0)->first();
        return view('frontend.products',compact('products','color','category','subcategory','childCategory'));
    }
    public function category_products($id)
    {
        $category_name = Category::find($id);
        $category_desc = CategoryDescription::where('category_id',$category_name->id)->where('status',0)->first();
        $category_slider = CategorySlider::where('category_id',$category_name->id)->where('status',0)->get();
        $products = Product::where('category_id',$category_name->id)->where('status',0)->paginate(20);
        $color = Color::where('status',0)->first();

        return view('frontend.category_product',compact('products','category_name','category_desc','category_slider','color'));
    }
    // public function managements()
    // {
    //     $teams = Team::where('status',0)->orderBy('id','asc')->get();
    //     $color = Color::where('status',0)->first();
    //     return view('frontend.managements',compact('teams','color'));
    // }
    // public function management_details($id){
    //     $member = Team::find($id);
    //   return view('frontend.management-details',compact('member'));

    // }
    public function clients()
    {
        $all_brands = Logo::where('status',0)->orderBy('id','asc')->get();
        $color = Color::where('status',0)->first();
        return view('frontend.clients',compact('all_brands','color'));
    }
    public function gallery()
    {
        $all_photo = Gallery::where('type','photo')->get();
        $color = Color::where('status',0)->first();
        $page = Page::where('id', 26)->first();
        $all_category = Category::where('status',0)->orderBy('id','asc')->get();
        return view('frontend.gallery',compact('all_photo','color','page', 'all_category'));
    }
    
    public function award()
    {
        $all_photo = Logo::orderBy('id','asc')->get();
        $color = Color::where('status',0)->first();
        return view('frontend.award',compact('all_photo','color'));
    }
  
  
    
    //  public function terms()
    // {
    //     $color = Color::where('status',0)->first();
    //     return view('frontend.terms-conditing',compact('color'));
    // }
    // public function policy()
    // {
    //     $color = Color::where('status',0)->first();
    //     return view('frontend.privacy-policy',compact('color'));
    // }
    // public function retunss()
    // {
    //     $color = Color::where('status',0)->first();
    //     return view('frontend.refund-retuns',compact('color'));
    // }
    
    public function contactus()
    {
        $color = Color::where('status',0)->first();
        return view('frontend.contactus',compact('color'));
    }
    public function contact_us($id)
    {
        $color = Color::where('status',0)->first();
        $product_name = Product::where('id',$id)->first();
        return view('frontend.contact_us',compact('color','product_name'));
    }
    
    public function aboutus()
    {
        $color = Color::where('status',0)->first();
        $teams = Team::where('status',0)->orderBy('id','desc')->get();
        $all_brands = Logo::where('status',0)->orderBy('id','asc')->get();
        $aboutus = Page::where('id',14)->first();
        return view('frontend.profile',compact('aboutus','all_brands','teams','color'));
    }
    
    public function services()
    {
        $color = Color::where('status', 0)->first();
        $teams = Team::where('status', 0)->orderBy('id', 'desc')->get();
        $all_brands = Logo::where('status', 0)->orderBy('id', 'asc')->get();
        $aboutus = Page::where('id', 20)->first();
        return view('frontend.aboutus', compact('aboutus', 'all_brands', 'teams', 'color'));
    }
    public function career()
    {
        $aboutus = Page::where('id', 22)->first();
        return view('frontend.aboutus', compact('aboutus'));
    }
    public function candidate()
    {
        $aboutus = Page::where('id', 24)->first();
        return view('frontend.aboutus', compact('aboutus'));
    }
     public function privacy()
    {
        $aboutus = Page::where('id', 28)->first();
        return view('frontend.aboutus', compact('aboutus'));
    }
    public function termss()
    {
        $aboutus = Page::where('id', 27)->first();
        return view('frontend.aboutus', compact('aboutus'));
    }


     public function notice()
    {
        $all_notice = Notice::orderBy('id','desc')->get();
        return view('frontend.notice', compact('all_notice'));
    }
    
    
    // public function compliance()
    // {
    //     $teams = Team::where('status',0)->orderBy('id','asc')->get();
    //     $all_brands = Logo::where('status',0)->orderBy('id','asc')->get();
    //     $compliance = Page::where('id',18)->first();
    //     return view('frontend.compliance',compact('compliance','all_brands','teams'));
    // }
    public function news()
    {
        $teams = Team::where('status',0)->orderBy('id','asc')->get();
        $all_brands = Logo::where('status',0)->orderBy('id','asc')->get();
        $news = Page::where('id',19)->first();
        return view('frontend.commitment',compact('news','all_brands','teams'));
    }


    // public function profile()
    // {
    //     $aboutus = Page::where('page_name','About Us')->first();
    //     $color = Color::where('status',0)->first();
    //     $datas = Aboutus::where('id',6)->first();
    //     return view('frontend.profile',compact('aboutus','color','datas'));
    // }
    public function message()
    {
        $aboutus = Page::where('page_name','About Us')->first();
        $color = Color::where('status',0)->first();
        $datas = Aboutus::where('id',7)->first();
        return view('frontend.message',compact('aboutus','color','datas'));
    }
    public function send_message(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        Message::insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'message' => $request->message,
        ]);
        \Mail::send('email.contact_email',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'phone' => $request->get('phone'),
                 'user_message' => $request->get('message'),
             ), function($message) use ($request)
               {
                  $message->from($request->email);
                  $message->to('')->subject('Customer Message');;
               });

        return back()->with('success','Message Sent Successfully');

    }
    public function blog($type=null)
    {
        $all_blog = Blog::orderBy('id','desc')->where('type', 'blog')->take(3)->get();
        $all_blog_list = Blog::orderBy('id','desc')->where('type', 'blog')->take(10)->get();
        return view('frontend.blog',compact('all_blog','all_blog_list', 'type'));
    }
    public function blog_details($id)
    {
        $blog = Blog::where('id',$id)->first();
        $all_blog_list = Blog::orderBy('id','desc')->take(8)->get();
        return view('frontend.blog_details',compact('blog','all_blog_list'));
    }
    public function course_details($id)
    {
        $course = Category::where('id',$id)->first();
        $related_course = Category::where('id','!=',$course->id)->take(8)->get();
        return view('frontend.course_details',compact('course','related_course'));
    }
    public function downloadcertificate(){
        return view('frontend.downloadcertificate');
    }
    public function load_certificate(Request $request){
        $search = $request->input('search');
        $data = Trade::where('passport_no', $search)->get();
        // dd($data);
        return response()->json([
            'html' => view('frontend.certificate-info', compact('data'))->render()
        ]);
    }
    public function downloadreport(){
        return view('frontend.downlaodreport');
    }
    public function load_info(Request $request){
        $search = $request->input('search');
        $data = MedicalReport::where('passport', $search)->get();
        return response()->json([
            'html' => view('frontend.report-info', compact('data'))->render()
        ]);
    }
    public function onlineapply(){
        $all_category = Category::where('status',0)->orderBy('id','asc')->get();
        return view('frontend.traderegister', compact('all_category'));
    }
    public function traderegistration($id){
        $all_category = Category::where('status',0)->orderBy('id','asc')->get();
        return view('frontend.traderegister', compact('all_category', 'id'));
    }
    public function store_trade(Request $request){
        
        $request->validate([
            'name' => 'required|string',
            // 'gender' => 'required',
            // 'bn_registration_no' => 'required',
            // 'passport_no' => 'required',
            // 'passport_issue_date' => 'required',
            // 'passport_expirary_date' => 'required',
            
            // 'document_issues' => 'required',
            'phone' => ['required','regex:/(\+){0,1}(88){0,1}01(3|4|5|6|7|8|9)(\d){8}/','min:11','max:15','unique:trades'],
            // 'address' => 'required'
            
        ]);
        $current_year = date('Y');

        $latest_trade = Trade::orderby('id', 'desc')->first();
        
        
        
        $latest_registration_no = $latest_trade ? (int)$latest_trade->register_no : 0;
        $new_registration_no = str_pad($latest_registration_no + 1, 6, '0', STR_PAD_LEFT);

        $new_certificate_no = 'C-' . $new_registration_no . '/' . $current_year;
        
        $data = new Trade;
        $data->trade_course = $request->trade_course; 
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
         $data->register_no = $new_registration_no;
        $data->certificate_no = $new_certificate_no;
        $data->save();
        $data->created_at = Carbon::now();
        return back()->with('success','Information Stored Successfully');
    }
    public function downloadcerti($id){
        $data = Trade::where('training_status', 1)->find($id);
        return view('frontend.downloadfile',compact('data'));
    }
}
