<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{App\Header::where('status',0)->first()->header_title}} - @yield('title')</title>
    <meta name="description" content="SDC Overseas Training And Testing Center">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/uploads/header/'.App\Header::where('status',0)->first()->favicon)}}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets/css/uikit.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/header_two.css')}}">
    <!-- bootstrap 5.0.2 ---->
     <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400&display=swap" rel="stylesheet">
    <!--custom-->
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">

    @php
        $top_navbar_color = App\Header::where('status',0)->first()->top_header_color;
        $navbar_color = App\Header::where('status',0)->first()->navbar_color;
        $navscroll_color = App\Header::where('status',0)->first()->navscroll_color;
        $btn_color = App\Header::where('status',0)->first()->btn_color;
        $btn_hover_color = App\Header::where('status',0)->first()->btn_hover_color;
    @endphp
    <style>

    #header2_mid{
        background:{{$top_navbar_color}};
    }
    #botomnav{
        background: {{ $navbar_color }};
        padding: 10px 0;
    }
    .nav-scroll{
        background:{{ $navscroll_color }}!important;
    }
    .br{
          background: {{ $navbar_color }};
    }

      .home .caption a,.btn, #aboutus-three .continuereading a{
        background:{{$btn_color}};
    }

    #botomnav nav ul ul li{
        background: #1a2431cf;
    }

    .home .caption a:hover,.btn:hover, #aboutus-three .continuereading a:hover {
        background:{{$btn_hover_color}};
    }

    #botomnav nav ul li a:hover,#botomnav nav ul ul li a:hover{
        color:{{$btn_hover_color}};
    }


    .home .controls .prev, .home .controls .next {
        border: 2px solid {{$btn_color}};
        color:{{$btn_color}};
        border-radius: 5px;
    }

    .home .controls .prev:hover, .home .controls .next:hover {
    color: #ffffff;
    background-color: {{$btn_color}};
    }

    #product-category-three .uk-position-small {
        background: {{$btn_color}};
    }
    #brand-section-two h2 {
    border-left: 5px solid {{$btn_color}};
    }

   #product-details .cart-buy .addcart:before {
    background: {{$btn_color}};
    color:#fff;
    }
    #product-details .cart-buy .addcart {
    border: 1px solid {{$btn_color}};
        border-radius: 5px;
    }

  #product-categories .card-body .view-items a {
    background: {{$btn_color}};
    }
    @media only screen and (max-width: 578px) {
         #botomnav nav ul  {
        background: #31618d;
        }
    }
    @media (max-width: 968px){
        #botomnav .icon {
            color: {{$btn_color}};
        }
        #topnav-two{
            display:none;
        }
    }

    #product-categories .card-body .view-items a:hover {
    background: {{$btn_hover_color}};
    }

    #product-categories .card:hover, #product-categories-alvi .card:hover {
    box-shadow: 0 1px 13px 1px {{$btn_hover_color}};
    }
    #topnav-two .left-top-two i, #topnav-two .right-top-two i {
    color: {{$btn_color}};
    }
    #blog-details .blog-sidebar .sidebar-cart a {
    background: {{$btn_color}};
    }
    h1, h2, h3, h4, h5, h6,.readmore {
    color: {{$btn_color}};
    }
    #bottom-stiky-nav nav a .fas,.fab{
     color: {{$btn_color}};
    }

    </style>

    @yield('css')
</head>

<body>
    @php
        $header = App\Header::where('status',0)->first();
        $footer = App\Footer::where('status',0)->first();
        $color = App\Color::where('status',0)->first();
        $colors = App\Color::where('id',2)->first();
        $header_one = App\HeaderSetting::where('id',1)->first();
        $header_two = App\HeaderSetting::where('id',2)->first();
        $header_three = App\HeaderSetting::where('id',3)->first();
        $all_category = App\Category::where('status',0)->get();
        $all_subcategory = App\SubCategory::where('status',0)->get();

    @endphp
<section id="topnav" class="top-nav" >
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-6">
                    <div class="left-topnav">
                        <!--<p class="d-none d-md-flex">{{$header->header_title}}</p>-->

                    </div>
                </div>
                <div class="col-6 col-md-6 d-flex">
                    <div class="right-topnav">
                         <p class="d-none d-md-flex">{{$header->header_title}}</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------Navbar section active (H)------>
    <div class="sticky-header" id="">
       {{-- <section id="header2_mid" class="header2_mid ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-sm-12">
                        <div class="head2_mid_logo">
                            <a href="{{url('/')}}" class="d-none d-md-block">
                                <img src="{{asset('uploads/header')}}/{{$header->image}}" alt="">
                            </a>
                            <a href="{{url('/')}}" class="d-md-none">
                                <img src="{{asset('uploads/footer')}}/{{App\Footer::where('status',0)->first()->image}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="head2_mobile">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <div class="headmid-icon"><i class="fas fa-phone"></i></div>
                                </div>
                                <div class="col-10">
                                    <h6>{{$header->mobile}}</h6>
                                    <span>{{$header->email}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="head2_mobile">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <div class="headmid-icon">
                                        <i class="far fa-clock"></i>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <h6>{{$header->open}}</h6>
                                    <span>{{$header->close}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="head2_address">
                                <div class="row">
                                    <div class="col-2 text-center">
                                        <div class="headmid-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <h6>{{$footer->address}}</h6>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Header- 2 Navbar active (H)-->
        <section id="botomnav" class="botom-nav bottomnavThree" style="display:{{$header_two->display}};">
            <div class="container">
                <div class="align-items-center row ">
                    <div class="col-md-2 col-sm-12">
                        <div class="head2_mid_logo">
                            <a href="{{url('/')}}" class="d-none d-md-block">
                                <img src="{{asset('uploads/header')}}/{{$header->image}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-10 bottomnav-items">
                        <nav>
                            <div class="logo d-sm-none">
                                <a href="{{url('/')}}">
                                    <img src="{{asset('uploads/header')}}/{{$header->image}}" alt="">
                                </a>
                                <div class="right-top-two d-flex d-sm-none ">
                                    <div class="social d-none">
                                        <!--<a class="d-none d-md-inline" id="searchIcon" title="Search"><i class="fas fa-search"></i></a>-->
                                        <a href="{{$footer->facebook}}" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{$footer->whatsapp}}" title="Whatsapp" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                        <a href="{{$footer->linkedIn}}" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="{{$header->email}}" title="Email" target="_blank"><i class="fab fas fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                            <label for="btn" class="icon">
                                <span class="fa fa-bars"></span>
                            </label>
                            <input type="checkbox" id="btn">
                            <ul class="nav-menu">
                                <li><a href="{{url('/')}}">Home</a></li>

                                <li><a href="{{url('about-us')}}"><span></span> About Us</a></li>

                                {{--<li >
                                    <label for="btn-1" class="show" style="color: white">About Us +</label>
                                    <a href="#">About Us</a>
                                    <input type="checkbox" id="btn-1">
                                    <ul>
                                        <li><a href="{{url('company-profile')}}"><span></span> Company Profile</a></li>
                                        <li><a href="{{url('award-certifications')}}"><span></span> Award & Certifications</a></li>
                                    </ul>
                                </li>
                               <li>
                                    <label for="btn-2" class="show">Services +</label>
                                    <a href="#">Services</a>
                                    <input type="checkbox" id="btn-2">
                                    <ul class="menu-list main-category">
                                        @foreach($all_category as $data)

                                        <li class="text-left ">
                                            <label for="btn-3-{{$data->id}}" class="show">{{$data->category_name}} +</label>
                                            <a href="{{url('category_products')}}/{{$data->id}}">{{$data->category_name}}</a>
                                            @php
                                            $all_subcategory = App\SubCategory::where('status',0)->where('category_id',$data->id)->get();
                                            @endphp
                                            <input type="checkbox" id="btn-3-{{$data->id}}">
                                            <ul class="subUl" style="padding-left: 24px; width: 100%; margin-left:-3px">
                                                @foreach($all_subcategory as $sub_data)
                                                <li>
                                                    <label for="btn-4" class="show"><a href="{{url('products')}}/{{$sub_data->id}}">{{$sub_data->title}}</a></label>
                                                    <a class="dropdownul" href="{{url('products')}}/{{$sub_data->id}}">{{$sub_data->title}}</a>
                                                    <input type="checkbox" id="btn-4">
                                                    <ul class="menu-list" style="margin-left: 22px; width: 100%;">
                                                        @php
                                                        $all_childcategory = App\ChildCategory::where('status',0)->where('subcategory_id',$sub_data->id)->get();
                                                        @endphp
                                                        @foreach($all_childcategory as $child_data)
                                                        <li><a href="{{url('products')}}/{{$child_data->id}}">{{$child_data->title}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li >
                                    <label for="btn-service" class="show" style="color: white">Candidate Service +</label>
                                    <a href="#">Candidate Service</a>
                                    <input type="checkbox" id="btn-service">
                                    <ul>
                                        <li><a href="{{url('apply-online')}}"><span></span> Apply online</a></li>
                                        <li><a href="{{url('download-certificate')}}"><span></span> Download Certificate</a></li>
                                    </ul>
                                </li>--}}
                                <li >
                                    <label for="btn-service" class="show" style="color: white">Download +</label>
                                    <a href="#">Download</a>
                                    <input type="checkbox" id="btn-service">
                                    <ul>
                                        <li><a href="{{url('download-certificate')}}"><span></span> Download Certificate</a></li>
                                        <li><a href="{{url('download')}}" > WQT Report</a></li>
                                    </ul>
                                </li>
                               {{-- <li><a href="{{url('download-certificate')}}"><span></span> Download Certificate</a></li>--}}
                                <li><a href="{{url('services')}}"> Services</a></li>
                                <!--<li><a href="{{url('candidate-service')}}"> Candidate Service</a></li>-->
                                <li><a href="{{url('hot-jobs')}}"> Hot Jobs</a></li>
                                <li><a href="{{url('skill-training')}}"> Skill Training</a></li>
                                <!--<li><a href="">Apply Online</a></li>-->
                                <!--<li><a href="{{url('gallery')}}"> Gallery</a></li>-->
                                <li><a href="{{url('blog')}}">Blog</a></li>
                                <li><a href="{{url('contact-us')}}"> Contact Us</a></li>
                                
                                <li><a href="{{url('apply-online')}}" style="background:red;color:#fff;"><span></span> Apply online</a></li>
                                <!--<li><a href="{{url('notice')}}">Notice</a></li>-->
                                <!--<li class="download"><a href="{{url('download')}}" > Download Report</a></li>-->
                                
                            </ul>
                           
                        </nav>
                            
                    </div>
                </div>
            </div>
        </section>
    </div>


    @yield('content')

    <!-- Footer Section Start -->
    @php
    $footer = App\Footer::where('status',0)->first();
    $footer_one = App\FooterSetting::where('id',1)->first();
    $footer_two = App\FooterSetting::where('id',2)->first();
    @endphp
    <section id="footer-top" class="py-4" style="display:none" style="background:{{$footer->footer_bg}}">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        {{-- <a href="#"><h1>SI<span>TE</span>LOGO.</h1></a> --}}
                        <a href="#">
                            <img src="{{asset('uploads/footer')}}/{{$footer->image}}" alt="">
                        </a>
                    </div>
                    <div class="description">
                        <p>{{$footer->short_description}}</p>
                    </div>
                    <div class="address">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        <span>{{$footer->address}}</span>
                    </div>
                    <div class="email-address">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>{{$footer->email}}</span>
                    </div>
                    <div class="phone-number">
                        <i class="fas fa-phone mr-2"></i>
                        <span>{{$footer->mobile}}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-6">
                            <h5 style="color:{{$color->color_code}}">Useful links</h5>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Delivery</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Complain</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <h5 style="color:{{$color->color_code}}">My Account</h5>
                            <ul>
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Order History</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Order Tracking</a></li>
                                <li><a href="#">Claim</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Instagram</h5>
                    <div class="row">
                        @php
                        $all_category = App\Category::where('status',0)->orderBy('id','desc')->take(12)->get();
                        @endphp
                        @foreach($all_category as $category)
                        <div class="col-3 my-2">
                            <img src="{{asset('uploads/category')}}/{{$category->image}}" alt="" class="img-fluid">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="br mt-5"></div>
        </div>
    </section>


    <!--footer active (h)-->
    <section id="footer-three" class="footer-three" style="background: linear-gradient(to left, #0957c58f , #a4a3d0cf 100%), url('{{ asset('footer-bg/1.png') }}') ">
        <div class="container">
            <div class="row footer-info">
                <div class="col-lg-4 col-md-4 col-sm-12 footer-address">
                    <!--<div class="logo">-->
                    <!--    <a href="{{url('/')}}"><img class="d-none d-md-block" src="{{asset('uploads/footer')}}/{{$footer->image}}" alt="" class="img-responsive"></a>-->
                    <!--</div>-->
                    <div class="title">
                        <h4>How to Make Video Resume </h4> <hr/>
                    </div>
                  <iframe width="100%" height="200" src="https://www.youtube.com/embed/vDXdbQssDZA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe><br/>
                  <br/>
                    <div class="title">
                        <h4>Jobs On YouTube </h4> <hr/>
                    </div>
                  <iframe width="100%" height="200" src="https://www.youtube.com/embed/gq8TP5s5gFA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 footer-address">
                     <div class="title">
                        <h4>Contact Us </h4> <hr/>
                    </div>
                    <div class="contact">
                            <p>{!! $footer->address !!}</p>
                        <p><i class="fas fa-envelope "></i>&nbsp; {{$footer->email}}</p>
                        <p><i class="fas fa-phone "></i> {{$footer->mobile}}</p>
                        @if($footer->teliphone)
                        <p><i class="fa fa-fax "></i> {{$footer->teliphone}}</p>
                        @endif
                    </div><br/>
                    
                    <div class="title">
                        <h4>Join With Social Media</h4> <hr/>
                    </div>
                    <div class="social">
                        <a href="https://www.facebook.com/CENTERSDC" title="Facebook" target="_blank"><i class="fab fa-facebook facebook"></i></a>
                        <a href="{{$footer->whatsapp}}" target="_blank" title="Whatsapp"><i class="fab fa-whatsapp whatsapp"></i></a>
                        <a href="https://twitter.com/sdcoverseas" title="Linkedin" target="_blank"><i class="fab fa-linkedin-in linkedin"></i></a>
                        <a href="mailto:{{$footer->email}}" title="Email" target="_blank"> <i class="fab fas fa-envelope email"></i> </a>
                        <a href="https://twitter.com/your_twitter_username" title="Twitter" target="_blank"><i class="fab fa-twitter twitter"></i></a>
                        <a href="https://www.instagram.com/sdc_training_center?igsh=dDFsMjl2bTd3dTM0" title="Instagram" target="_blank"><i class="fab fa-instagram instagram"></i></a>

                        <a href="https://www.youtube.com/@sdcoverseastrainingandtest4172" title="YouTube" target="_blank"><i class="fab fa-youtube youtube"></i></a>
                    </div><br/>
                    <div class="title">
                        <h4>Connect Facebook</h4> <hr/>
                    </div>
						<!------------------Start Facebook Like------------------>	
										<div class="fb-page" data-href="https://www.facebook.com/CENTERSDC" data-tabs="timeline" data-width="30" data-height="20" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/CENTERSDC" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/CENTERSDC"><div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v21.0"></script></a></blockquote></div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 footer-address">
                    <div class="title">
                        <h4>About SDC </h4> <hr/>
                    </div>
                    <div class="contact text-justify">
                        <p>SDC is one of the leading overseas manpower recruitment agency that delivers Human Resource solutions to a host of leading corporations worldwide. The company has successfully recruited more than 50,000 candidates for various projects in over 35 countries globally.<br/>
                        Our candidates are sourced from numerous countries in Asia, Africa and Europe including India, Nepal, Bangladesh, Sri Lanka, Indonesia, Turkey, Ghana, Nigeria, Uganda, Côte d’Ivoire, Tanzania, Kenya, Mauritius, Uzbekistan, Albania etc</p>
                    </div>
                    <br/>
                    <br/>
                     <h5 style="color:{{$color->color_code}}">Quick Links</h5>
                            <ul style="padding:0;">
                                <li><a href="/terms">Terms and Conditions</a></li>
                                <li><a href="/privacy-policy">Privacy Policy</a></li>
                                <li><a href="/contact-us">Contact Us</a></li>
                            </ul>
                </div>
            </div>
             <div class="footer-bottom">
                <p class="bottom-footer">&copy; @php echo Date('Y') @endphp All rights reserved by <strong>{{$footer->reserved_by}}. </strong> Developed by SDC <a href="https://www.sdc.com.bd/" style="color:#fff;">{{$footer->developed_by}} </a> </p>
            </div>
        </div>
    </section>


    {{-- <section id="footer-bottom" style="background:{{$footer->footer_bottom_bg}}">
        <div class="container">
            <p class="bottom-footer">&copy; @php echo Date('Y') @endphp All rights reserved by <strong>{{$footer->reserved_by}}.</strong> Developed by <a href="https://www.sdc.com.bd/">{{$footer->developed_by}} </a> </p>
        </div>
    </section> --}}
    <!-- Place this code at the bottom of your HTML body -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v13.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution="setup_tool"
  page_id="132561533265435"
  theme_color="#0084ff"
  logged_in_greeting="Hello! How can we help you today?"
  logged_out_greeting="Hello! How can we help you today?">
</div>

    <!-- Footer Section End -->

    <!-- JS here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-circle-progress/1.2.2/circle-progress.min.js"></script>
    <script src="{{asset('assets/js/progress.js')}}"></script>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/sliderScript.js')}}"></script>
    <script src="{{asset('assets/js/uikit.min.js')}}"></script>
    <script src="{{asset('assets/js/uikit-icons.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.meanmenu.min.js')}}"></script>
    <script src="{{asset('assets/js/slick.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!--<script src="{{asset('assets/js/main.js')}}"></script>-->
    <!--<script src="{{asset('assets/js/particles/particles.js')}}"></script>-->
    <!--<script src="{{asset('assets/js/particles/app.js')}}"></script>-->

    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--scroll navbar color change 2-->
    {{--<script>
        $(document).ready(function() {
            $(window).on("scroll", function() {
                var wn = $(window).scrollTop();
                console.log(wn);
                var navbarScroll = $("#navbarScroll");
                if (wn > 100) {
                    navbarScroll.css("background-color", "#000");
                    $("#header2_mid").addClass("after-scroll");
                    $("#header2_mid").removeClass("before-scroll");
                    $("#header2_mid").css("transition", ".7s");

                } else {
                    navbarScroll.css("background-color", "transparent");
                    $("#header2_mid").addClass("before-scroll");
                    $("#header2_mid").removeClass("after-scroll");
                    $("#header2_mid").css("transition", ".7s");
                }
            });
        });
    </script>--}}
    <!--End scroll navbar color change 2-->
    
    <script>
         $(document).ready(function(){
            $(window).on("scroll",function(){
            var wn = $(window).scrollTop();
            // console.log(wn);
            if(wn > 100){
                $('.bottomnavThree').addClass('nav-scroll');
            }
            else{
                $('.bottomnavThree').removeClass('nav-scroll');
            }
          });
        });
        // AOS.init();
    </script>

    @yield('js')

</body>
</html>