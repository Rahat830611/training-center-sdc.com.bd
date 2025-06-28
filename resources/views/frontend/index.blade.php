@extends('layouts.frontend')

@section('title')
Home
@endsection

@section('content')
@php
$header = App\Header::where('status',0)->first();
$footer = App\Footer::where('status',0)->first();
$footer_one = App\FooterSetting::where('id',1)->first();
$footer_two = App\FooterSetting::where('id',2)->first();
@endphp
<!-- Slider2 Without Sidebar Section Start Here active (H)-->
<section id="slider-section" style="display: {{$without_sidebar->display}};">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 without_slider">
                <section class="home">
                    <div class="slider">
                        @foreach($all_slider as $slider)
                        <div class="slide active"
                            style="background-image: url('{{asset('uploads/slider')}}/{{$slider->image}}')">
                            <div class="container-slide">
                                <div class="caption">
                                    <h1>{{$slider->title}}</h1>
                                    {{-- <p>{{$slider->paragraph}}</p>
                                    <a href="{{$slider->url}}">{{$slider->button}}</a> --}}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- controls  -->
                    <div class="controls">
                        <div class="prev">
                            <</div> <div class="next">>
                        </div>
                    </div>

                    <!-- indicators -->
                    {{--<div class="indicator">
                       </div>--}}

                </section>
            </div>
            {{--   </div>
        </div> --}}
</section>
<!-- Slider2 Without Sidebar Section End  -->

<!-- Slider1 With Sidebar Section Start Here -->
<section id="slider-section" style="display: {{$with_sidebar->display}};">
    <div class="container">
        <div class="row">
            <div class="d-none d-lg-block col-lg-3">
                <div class="category-list">
                    <ul>
                        @foreach($all_category as $category)
                        <li class=""><a href="#">{{$category->category_name}}<i
                                    class="mt-1 float-right fas fa-angle-double-right"></i></a>
                        </li>
                        @endforeach
                        <li><a href="#" class="morecat">More Category<i class="float-right mt-1 fas fa-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-lg-9">
                <section class="home">
                    <div class="slider">
                        @foreach($all_slider as $slider)
                        <div class="slide active"
                            style="background-image: url('{{asset('uploads/slider')}}/{{$slider->image}}')">
                            <div class="container-slide">
                                <div class="caption">
                                    <h1>{{$slider->title}}</h1>
                                    <p>{{$slider->paragraph}}</p>
                                    <a href="">{{$slider->button}}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                    <!-- controls  -->
                    <div class="controls">
                        <div class="prev">
                            <</div> <div class="next">>
                        </div>
                    </div>

                    <!-- indicators -->
                    <div class="indicator">
                    </div>

                </section>
            </div>
        </div>
    </div>
</section>
<!-- Slider1 With Sidebar Section End  -->

<!-- Feature Experties Section-->
{{--<section id="paralex-commitment" style="background: linear-gradient(180deg, #013881cf 0, #000000), url({{asset('uploads/aboutus/'.$datas->client_bg_img)}});">
<div class="commitment">
    <div class="container">
        <div class="row">
            <div class="col-md-4 d-flex ">
                <div class="icon">
                    <i class="{{$datas->feature1_icon}}"></i>
                </div>
                <div class="content">
                    <h5>{{$datas->feature1_title}}</h5>
                    <p>{{$datas->feature1_description}}</p>
                </div>
            </div>
            <div class="col-md-4 d-flex ">
                <div class="icon">
                    <i class="{{$datas->feature2_icon}}"></i>
                </div>
                <div class="content">
                    <h5>{{$datas->feature2_title}}</h5>
                    <p>{{$datas->feature2_description}}</p>
                </div>
            </div>
            <div class="col-md-4 d-flex">
                <div class="icon">
                    <i class="{{$datas->feature3_icon}}"></i>
                </div>
                <div class="content">
                    <h5>{{$datas->feature3_title}}</h5>
                    <p>{{$datas->feature3_description}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
--}}
<!-- Paralext Experties Section-->


<!-- About Section Start One -->
<section id="aboutus-three" class="py-md-1" style="background:#167ac6">
    <div class="container pt-5 pb-0 pb-md-5">
        <div class="row">

            <div class="col-md-7">
                <div class="row">
                    <h2 style="color:#fff"><strong>Who we are</strong></h2>

                    <div class="content py-md-3">
                        <p style="color:#fff">
                            SDC is one of the leading overseas manpower recruitment agency that delivers Human Resource
                            solutions to a host of leading corporations worldwide. The company has successfully
                            recruited more than 20,000 candidates for various projects in over 35 countries
                            globally.<br /><br />
                            Our candidates are sourced from numerous countries in Asia, Africa and Europe including
                            South Korea,Malaysia, Qatar,Nepal, Bangladesh, Sri Lanka, Indonesia, Turkey, Ghana, Nigeria, Uganda, Tanzania,
                            Kenya, Mauritius, Uzbekistan, Albania etc<br /><br />
                            We work across various industries such as Oil & Gas, Construction & Infrastructure,
                            Healthcare, Food & Beverage, Hospitality, Mining, Retail, Education, Agriculture & Farming
                            etc

                        </p>
                        <!--<p>{!! strip_tags(Illuminate\Support\Str::limit($datas->description_one, 2700)) !!}</p>-->

                    </div>
                    <!--<div class="continuereading">-->
                    <!--    <a href="{{url('about-us')}}">CONTINUE READING</a>-->
                    <!--</div>-->
                </div>
            </div>
            <div class="col-md-5">
                <div class="">
                    <h2 style="color:#fff;">Are you Hiring ? <br />
                        Send us your requirement</h2>

                    <form>
                        <div class="row">
                            <div class="form-group col-md-6 float-left">
                                <select class="form-control">
                                    <option>Select an option</option>
                                    <option>Find Staffing for my project</option>
                                    <option>Hiring Employes for my companies</option>
                                </select>
                            </div><br />
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text" placeholder="Company Name">
                            </div>
                            <br />
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6  float-left">
                                <select class="form-control">
                                    <option>Select Country</option>
                                    <option>Bangladesh</option>
                                    <option>India</option>
                                </select>
                            </div>
                            <br />
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text" placeholder="Contact Person">
                            </div><br />
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text" placeholder="Email Address">
                            </div><br />
                            <div class="form-group col-md-6">
                                <input class="form-control" type="text" placeholder="Mobile Number">
                            </div><br />
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Write Message"
                                    id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div><br />
                        </div>
                        <button style="margin-bottom: 10px;" type="submit" class="btn btn-primary">Submit</button>
                       </div>
                </form>
            </div>
            <!--<div class="aboutus-img">-->
            <!--    <img src="{{asset('uploads/aboutus')}}/{{$datas->image}}" alt="Image">-->
            <!--</div>-->
        </div>
    </div>
    </div>
</section>
<!--/ About Section End One -->
<section id="aboutus-three" class="py-md-1 industry_we_cater_to">
    <div class="container pt-5 pb-0 pb-md-5">
        <div class="row">
            <div class="col-md-7">
                <h2>Industries We Cater To</h2>
                <div class="row">
                    <div class="col-md-6 pt-5 pb-0 pb-md-5">
                        <p><i aria-hidden="true" class="fas fa-tractor"></i> Welding</p>
                        <p><i aria-hidden="true" class="fas fa-car-side"></i> Plumbing</p>
                        <p><i aria-hidden="true" class="fas fa-plane"></i> Electrical</p>
                        <p><i aria-hidden="true" class="far fa-building"></i> Cleaner</p>
                        <p><i aria-hidden="true" class="fas fa-hard-hat"></i> Mechanical Engineering</p>
                        <p><i aria-hidden="true" class="fas fa-user-nurse"></i> Construction</p>
                        <p><i aria-hidden="true" class="fas fa-hotel"></i> Genaral worker</p>
                    </div>
                    <div class="col-md-6 pt-5 pb-0 pb-md-5">

                        <p><i aria-hidden="true" class="fas fa-truck-loading"></i> Painter</p>
                        <p><i aria-hidden="true" class="fas fa-laptop"></i> Information Technology</p>
                        <p><i aria-hidden="true" class="fas fa-oil-can"></i> Oil & Gas Refinery</p>
                        <p><i aria-hidden="true" class="fas fa-gas-pump"></i> Petroleum & Mining</p>
                        <p><i aria-hidden="true" class="fas fa-print"></i> Food & Packaging</p>
                        <p><i aria-hidden="true" class="fas fa-book"></i> Carpenter</p>
                        <p><i aria-hidden="true" class="fas fa-ship"></i> Shipping & Marine</p>
                        <p><i aria-hidden="true" class="fas fa-cogs"></i> Steel</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <h2>Our Sourcing Countries</h2>
                <img src="{{asset('uploads/aboutus/Copy-of-Untitled-Design-1-1024x1024.webp')}}" alt="Image">
            </div>
        </div>
    </div>
</section>


<section id="aboutus-three" class="py-md-1 industry_we_cater" style="background:#fff">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-md-6 mb-5 ">
                <img src="{{asset('uploads/aboutus/imaclient.jpg')}}" alt="Image">
                <div class="content_area">
                    <div class="row">
                        <h2>I'm a "Client"</h2>
                        <h2>HR & RECRUITMENT SOLUTIONS TO EMPOWER YOUR BUSINESS</h2>

                        <div class="colum20 text-center ">
                            <img src="{{asset('uploads/aboutus/SDC1.png')}}" class="center" alt="Image"><br />
                            <p>Contracting & Manpower Supply</p>
                        </div>
                        <div class="colum20 text-center ">
                            <img src="{{asset('uploads/aboutus/SDC2.png')}}" class="center" alt="Image"><br />
                            <p>Manpower Relocation Services</p>
                        </div>
                        <div class="colum20 text-center ">
                            <img src="{{asset('uploads/aboutus/SDC3.png')}}" class="center" alt="Image"><br />
                            <p>Recruitment & HR Solutions</p>
                        </div>
                        <div class="colum20 text-center ">
                            <img src="{{asset('uploads/aboutus/SDC4.png')}}" class="center" alt="Image"><br />
                            <p>PDPA Compliance</p>
                        </div>
                        <div class="colum20 text-center ">
                            <img src="{{asset('uploads/aboutus/SDC5.png')}}" class="center" alt="Image"><br />
                            <p>ICT & Telecom</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="client_candidate_right">
                        <div class="client_candidate">
                            <img src="{{asset('uploads/aboutus/imacandidate.jpg')}}" alt="Image">
                            <h2>I'm a "Candidate""</h2>
                            <h2>FIND A JOB THAT FITS YOUR CAREER GOALS</h2>

                            <form class="search_job">
                                <div class="row form-row align-items-center">
                                    <div class="col-auto col-md-8 search_job">
                                        <label class="sr-only" for="inlineFormInput">Name</label>
                                        <input type="text" class="form-control mb-2" id="inlineFormInput"
                                            placeholder="Job Name">
                                    </div>
                                    <div class="col-auto col-md-4 search_job">
                                        <button type="submit" class="btn btn-primary mb-2">SEARCH JOB</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="cleint-candidate" class="py-md-1 " style="background:#ffffff">
    <div class="container pt-5 pb-0 pb-md-5">
        <div class="row">
            <h2></h2>
            <img src="{{asset('uploads/aboutus/recruitment-precess.png')}}" alt="Image">
        </div>
    </div>
</section>
<!-- About Section Start One active (h)-->
{{--
    <div class="container-fluid gh-aboutus" style="background-image:url('{{ asset('uploads/aboutus/about-bg.png') }}');">
<section class="aboutuses">
    <div class="gh-aboutus-main">
        <div class="title">
            <h2>ABOUT OUR COMPANY</h2>
        </div>
        <div class="main">
            <div class="row">
                <div class="col-md-7 about-padding">
                    <a href="{{ url('about-us') }}" class="left">
                        <div class="text">
                            <h5>WHO WE ARE</h5>
                        </div>
                        <div class="content">
                            <p>{!! strip_tags(Illuminate\Support\Str::limit($datas->description_one, 1220)) !!}</p>
                        </div>
                        <div class="pic"><img src="{{ asset('uploads/aboutus/imanufacturing1.jpg') }}" alt="" /></div>
                    </a>
                </div>
                <div class="col-md-5 about-padding">
                    <a href="{{ url('about-us') }}" class="right">
                        <div class="pic"><img src="{{asset('uploads/aboutus')}}/{{$datas->image}}" alt="" /></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<!-- Category Section  (H)-->
<section class="category-section-title">
    <div class="container">
        <div class="row">
            <div class="col-12 margin-bottom-20">
                <h6 class="title-text">Skills Portal Features</h6>
                <h3>{{ $header->header_title }} </h3>
            </div>
        </div>
    </div>
</section>

<section id="product-categories-two" class="category-padding">
    <div class="category-overlay">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="trade-title">At present we are giving training on the following trades:</h5>
                </div>
            </div>
            <div class="row my-4">
                @foreach($all_category as $category)
                <div class="col-md-3 my-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img">
                                <a href="{{url('course-details')}}/{{$category->id}}"><img
                                        src="{{asset('uploads/category')}}/{{$category->image}}" class="img-fluid"
                                        alt=""></a>
                            </div>
                            <div class="card-title">
                                <a href="{{url('course-details')}}/{{$category->id}}">
                                    <p>{{ Illuminate\Support\Str::limit($category->category_name, 25)}}</p>
                                </a>
                            </div>
                            <div class="view-items">
                                <div class="border-div">
                                    <a href="{{url('course-details')}}/{{$category->id}}">View Details</a>
                                    <a href="{{url('trade-registration/'.$category->id)}}">Click to Apply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
--}}
<!--End Category Section -->

<!-- What we do-->

<section id="related-products" class="what_we_do_section">
    <div class="container  pt-5 pb-0 pb-md-5">
        <div class="row">
            <div class="col-md-4">
                <h2>What We Do</h2>
                <h3>HR Integrated Solutions & Recruitment</h3>
            </div>


            <div class="col-md-4">
                <div class="image_box">
                    <div class="main_img_area uk-inline" uk-lightbox="animation: fade;">
                        <p>We are a professional recruitment agency that provides sharp information and assistance in
                            making the most cost-effective decision, achieving the hire of the right candidate.</p>
                        <img src="{{asset('uploads/gallery/what-1.jpg')}}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="image_box">
                    <div class="main_img_area uk-inline" uk-lightbox="animation: fade;">
                        <p>We simplify onboarding processes; minimize administrative costs, time, and assure your
                            journey is compliant with local laws and regulations.</p>
                        <img src="{{asset('uploads/gallery/what-2.jpg')}}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="image_box">
                    <div class="main_img_area uk-inline" uk-lightbox="animation: fade;">
                        <p>Your One-Stop Service For Integrated Human Resource Solutions. Vinarco deploys hiring
                            capability suiting regional or national search-based solutions across South East Asia.</p>
                        <img src="{{asset('uploads/gallery/what-3.jpg')}}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="image_box">
                    <div class="main_img_area uk-inline" uk-lightbox="animation: fade;">
                        <p>Our team of experts are here to offer competitive data privacy protection and regulatory
                            services to help you deal with day-to-day data privacy compliance and maintenance
                            challenges, while allowing you to focus on the crucial areas in your business</p>
                        <img src="{{asset('uploads/gallery/what-4.jpg')}}">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="image_box" uk-lightbox="animation: fade;">
                    <div class="main_img_area uk-inline">
                        <p>We deliver telecommunication professional services which includes turnkey project management,
                            network implementation, network installation and commissioning and operation and maintenance
                            services</p>
                        <img src="{{asset('uploads/gallery/what-5.jpg')}}" class="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- WHat we do end-->

<!--Why Choose Us Start-->
<section id="" class="why_choose_us_section">
    <div class="container pt-5 pb-0 pb-md-5">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <h2 style="">Why Choose Us</h2>
                <p style="">SDC recruitment consultants works in partnership with clients to attain measurable
                    results and performance improvements through the provision of reliable and flexible workforce
                    solutions.</p>
                <h3>SDC Advantage</h3>
                <ol style="">
                    <li> Extensive and updated candidate pool </li>
                    <li> Expertise in wide range of industries</li>
                    <li> Work closely with clients to fully understand job requirements</li>
                    <li> Efficient candidate screening process</li>
                    <li> In-house candidate screening process</li>
                    <li> Submit only the most suitable candidates for the job</li>
                    <li> Support service after successful candidate placement</li>
                    <li>Multicultural & multilingual environment Korea,Singapore(Thai, Japanese, French, English , German)</li>
                </ol>
            </div>
            <div class="col-md-6 mt-4">
                <img src="{{asset('uploads/gallery/hr-1.jpg')}}" class="img-responsive" alt="" style="width:100%">
            </div>


        </div>
    </div>
</section>
<!-- Why Choose Us End-->

<!-- Client Review start-->
<section id="client_review" class="py-5 client_review">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3 mb-md-5 text-center">
                <h2> Clients Testimonial</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="uk-position-relative uk-visible-toggle uk-slider uk-slider-container" tabindex="-1"
                    uk-slider="autoplay: true; autoplay-interval: 3000">

                    <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-1@m"
                        style="transform: translate3d(-1116px, 0px, 0px);">
                        <li tabindex="-1" class="" style="order: 1;">
                            <div class="box Clients_Testimonial">
                                <div class="detail-box star_review">
                                    <div class="pricing">
                                        <p class="text-center">

                                            First of all, we would like to thank you for your always supporting us
                                            regarding our recruitment needs. Vinarco understands and can match
                                            candidates exactly with our requirements, and can give useful advice on
                                            recruitment matters. We are confident that the quality of service from
                                            Vinarco can fulfill our HR demands and continue being a good partner.
                                        </p>
                                        <p class="review_client text-center">Mohammad Mostafa Kamal (Japan)</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li tabindex="-1" class="" style="order: 1;">
                            <div class="box Clients_Testimonial">
                                <div class="detail-box star_review">
                                    <div class="pricing">
                                        <p class="text-center">

                                            First of all, we would like to thank you for your always supporting us
                                            regarding our recruitment needs. Vinarco understands and can match
                                            candidates exactly with our requirements, and can give useful advice on
                                            recruitment matters. We are confident that the quality of service from
                                            Vinarco can fulfill our HR demands and continue being a good partner.
                                        </p>

                                        <p class="review_client text-center">Mohammad Mostafa Kamal (Japan)</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li tabindex="-1" class="" style="order: 1;">
                            <div class="box Clients_Testimonial">
                                <div class="detail-box star_review">
                                    <div class="pricing">
                                        <p class="text-center">
                                            First of all, we would like to thank you for your always supporting us
                                            regarding our recruitment needs. Vinarco understands and can match
                                            candidates exactly with our requirements, and can give useful advice on
                                            recruitment matters. We are confident that the quality of service from
                                            Vinarco can fulfill our HR demands and continue being a good partner. </p>

                                        <p class="review_client text-center">Mohammad Mostafa Kamal (Japan)</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-icon uk-slidenav-previous uk-slidenav"
                        href="#" uk-slidenav-previous="" uk-slider-item="previous"><svg width="14" height="24"
                            viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg">
                            <polyline fill="none" stroke="#000" stroke-width="1.4"
                                points="12.775,1 1.225,12 12.775,23 "></polyline>
                        </svg></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-icon uk-slidenav-next uk-slidenav"
                        href="#" uk-slidenav-next="" uk-slider-item="next"><svg width="14" height="24"
                            viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg">
                            <polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 ">
                            </polyline>
                        </svg></a>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>

<!-- Client Review End-->


<!--Gallery Section active  (H)-->

{{--<section id="related-products" class="section-product">
    <div class="container">
        <div class="row">
            <div class="col-12 margin-bottom-20">
                <h6 class="title-text">OUR PHOTO GALLERY</h6>
                <h3>{{App\Header::where('status',0)->first()->header_title}} Gallery</h3>
</div>
</div>
<div class="row">

    <div class="uk-position-relative uk-visible-toggle" tabindex="-1"
        uk-slider="autoplay: true; autoplay-interval: 3000">

        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m">
            @foreach($all_photo as $photo)
            <li>
                <div class="box">
                    <div class="slide-img" uk-lightbox="animation: fade" style="position:absolute;">
                        <a href="{{asset('uploads/gallery')}}/{{$photo->image}}" class="uk-inline"
                            data-caption="{{$photo->title}}" target="_blank">
                            <img src="{{asset('uploads/gallery')}}/{{$photo->image}}" class="img-fluid gallery-img"
                                alt="">
                        </a>
                    </div>

                    <div class="detail-box" style="position:relative;">>
                        <div class="title factory">
                            <h4>{{$photo->title}}</h4>
                            <p class="text-center" style="color:{{$color->color_code}}">We work across various
                                industries such as Oil & Gas, Construction & Infrastructure, Healthcare,Shipyard,Food &
                                Beverage, Hospitality, Mining, Retail, Education, Agriculture & Farming etc</p>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
            uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
            uk-slider-item="next"></a>

    </div>

</div>
</div>
</section> --}}
<!-- End Gallery Section active  (H)-->


<!-- Product Categories Section active  (H)-->
{{-- <section id="related-products" class="section-product">
    <div class="container">
        <div class="row">
            <div class="col-12 margin-bottom-20">
                <h6 class="title-text">OUR ALL PRODUCTS</h6>
                <h3>{{App\Header::where('status',0)->first()->header_title}} Products.</h3>
</div>
</div>
<div class="row">

    <div class="uk-position-relative uk-visible-toggle" tabindex="-1"
        uk-slider="autoplay: true; autoplay-interval: 3000">

        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m">
            @foreach($all_product as $product)
            <li>
                <div class="box">
                    <div class="slide-img">
                        <img src="{{asset('uploads/product')}}/{{$product->image}}" alt="1">
                        <div class="overlay">
                            <a href="{{url('product_details')}}/{{$product->id}}" class="add-cart">View Details</a>
                        </div>
                    </div>
                    <div class="detail-box">
                        <div class="title factory">
                            <a href="{{url('product_details')}}/{{$product->id}}">
                                <h5>{{$product->product_name??''}}</h5>
                            </a>
                        </div>

                        <div class="pricing">
                            <h6>$ {{$product->price}}</h6>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>

        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
            uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
            uk-slider-item="next"></a>

    </div>

</div>
</div>
</section> --}}
<!-- End Product Categories Section active  (H)-->

<!-- Blog Section Start -->
<section id="home-blog" class="home-blog home_blog_section">
    <div class="container">
        <div class="row">
            <div class="col-12 margin-bottom-20">
                <!--<h2 class="title-text">LATEST NEW & Activities</h2>-->
                <h2>Latest News & Activities </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="uk-position-relative uk-visible-toggle" tabindex="-1"
                    uk-slider="autoplay: true; autoplay-interval: 5000">
                    <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-3@m">
                        @foreach ($blog as $blog)
                        <li class="px-3">
                            <div class="home_blog_area"
                                style="background: #fff;padding-bottom:15px;padding-top:5px;border-radius: 25px;">
                                <div class="blog-card">
                                    <div class="image">
                                        <img src="{{asset('uploads/blog')}}/{{$blog->image}}" alt="Blog Image">

                                    </div>
                                    <!--<div class="caption">-->
                                    <!--    <div class="border-blog">-->
                                    <!--        <h5>{{ Illuminate\Support\Str::limit($blog->title, 20) }}</h5>-->
                                    <!--        <p>{{ Illuminate\Support\Str::limit($blog->short_description, 80) }}</p>-->
                                    <!--        <div class="view-details">-->
                                    <!--            <a href="{{url('blog_details')}}/{{$blog->id}}">Read More</a>-->
                                    <!--        </div>-->

                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                                <div class="blog-title-bottom">
                                    <h4>{{$blog->title }}</h4>

                                    <!--<h4>{{ Illuminate\Support\Str::limit($blog->title, 20) }}</h4>-->
                                    <p>{{ Illuminate\Support\Str::limit($blog->short_description, 180) }}</p>
                                    <div class="view-details">
                                        <a href="{{url('blog_details')}}/{{$blog->id}}">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                        uk-slider-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                        uk-slider-item="next"></a>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->

<!-- Brand Section Start active-->
<section id="brand-section-two" class="brand-section"
    style="background-color:#C5C5C5;background-image:url(https://www.omanagencies.com/wp-content/uploads/2022/03/pexels-pixabay-258160.jpg); padding:70px 0">
    <!--<section id="brand-section-two" class="brand-section" style="background:linear-gradient(to left, #a4a4a4cc  , #a4a4a4cc  100%), url({{asset('uploads/aboutus/'.$datas->client_bg_img)}})">-->
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h3 class="text-center">{{$datas->client_title}}</h3><br />
                <!--<p>{{$datas->client_description}}</p>-->
            </div>
            <div class="col-md-12 col-sm-12 brand-logo">
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                uk-slider="autoplay: true; autoplay-interval: 3000">

                <ul class="uk-slider-items uk-child-width-1-6 uk-child-width-1-6@s uk-child-width-1-6@m">
                    @foreach($all_brands as $brand)
                    <li class="text-center">
                        <img class="client-img" src="{{asset('uploads/logo')}}/{{$brand->logo}}" alt="">
                    </li>
                    @endforeach
                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous
                    uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next
                    uk-slider-item="next"></a>

            </div>
            </div>
        </div>
    </div>
</section>
<!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>

    <div id="fb-customer-chat" class="fb-customerchat"></div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "PAGE-ID");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>


    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'API-VERSION'
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
<!-- Brand Section End -->


<!-- Newslatter Section End -->
@endsection