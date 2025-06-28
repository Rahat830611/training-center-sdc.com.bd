@extends('layouts.frontend')

@section('title')
  {{ $aboutus->page_name }}
@endsection


@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">{{ $aboutus->page_name }}</h2>
       </div>
    </section>
    <section id="page-section" class="my-md-5">
        <div class="container py-3">
            <div class="row">
                @if ($aboutus->image)
                
                <div class="col-md-6">
                    <div class="top-image">
                        <img  src="{{asset('uploads/page')}}/{{$aboutus->image}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    {!!$aboutus->description!!}
                </div>
                @else
                <div class="col-md-12">
                    {!!$aboutus->description!!}
                </div>
                @endif
                
                @if (isset($aboutus->description_two))
                <div class="col-12 mt-4">
                    <!--<p style="font-size:18px;">    Our unique vision , mission and values capture the essence of who we are and how we interact with one another. In addition, it speaks to how we go  to market and our commitment to delivering excellence to our customer.</p>-->
                    {!!$aboutus->description_two!!}
                </div>
                @endif
            </div>
        </div>
    </section>




<!-- Our Team Section Start -->
    {{-- <section id="exclusive-products" class="">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center">Management Team</h3>
                    </div>
                </div>
            </div>
            <div class="row mb-5">

                <div class="col-lg-12">
                    <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 3000">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m" style="display:flex;align-items: center; justify-content: center; flex-wrap: wrap;">
                            @foreach($teams as $team)
                            <li>
                                <a href="{{url('/managements/'.$team->id)}}">
                                    <div class="box">
                                        <div class="slide-img">
                                            <img src="{{asset('uploads/team')}}/{{$team->image}}" alt="1">
                                            <div class="overlay">
                                                <a href="#" class="buy-now">Order Now</a>
                                                <a href="#" class="add-cart">{{$team->designation??''}}</a>
                                            </div>
                                        </div>
                                        <div class="detail-box">
                                            <div class="title">
                                                <h5 class="text-center" style="color:#04a901;">{{$team->name}}</h5>
                                            </div>
                                             <div class="pricing_designation">
                                                <h6 class="text-center"  style="color:#04a901;font-size: 12px;">({{$team->designation??''}})</h6>
                                            </div>
                                            <p class="text-justify" style="font-size:14px;">{{ substr($team->description, 0,  50) }} <a href="{{url('/managements/'.$team->id)}}" class="text-info">Read more...</a></p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
<!-- Our Team Section End -->

















    <!-- Brand Section Start -->
    {{--<section id="brand-section-two" class="py-5 mt-md-4" style="background-image: url({{asset('assets/img/bg-parallax3.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>SHOP BRANDS</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi consectetur, eaque molestias officia tempora nostrum blanditiis, fugit ipsam porro amet, iusto perspiciatis dolore dolor praesentium voluptas recusandae perferendis laboriosam quo nobis assumenda? Quidem et rem optio provident! Nostrum, voluptatem omnis fugit, ratione deleniti inventore quisquam dignissimos repellat alias reprehenderit a!</p>
                </div>
                <div class="col-md-8 mt-5 pt-md-5">
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 3000">

                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-2@s uk-child-width-1-3@m">
                            @foreach($all_brands as $brand)
                            <li class="text-center">
                                <img src="{{asset('uploads/logo')}}/{{$brand->logo}}" alt="">
                            </li>
                            @endforeach
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                    </div>
                </div>
            </div>
        </div>
    </section>--}}
    <!-- Brand Section End -->

    {{--<section id="team-section" class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-md-4 text-center">
                    <h6 class="title-text">OUR MANAGEMENT TEAM</h6>
                    <h3>Shining Apparels Team.</h3>
                </div>
            </div>
            <div class="row">
                @foreach ($teams as $teams)
                <div class="col-md-3 my-2">
                    <div class="team-card">
                        <div class="card-top">
                            <div class="image">
                                <img src="{{asset('uploads/team')}}/{{$teams->image}}" alt="">
                            </div>
                            <!--<div class="content">-->
                            <!--    <div class="social">-->
                            <!--        <a href="facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>-->
                            <!--        <a href="facebook.com" target="_blank"><i class="fab fa-whatsapp"></i></a>-->
                            <!--        <a href="facebook.com" target="_blank"><i class="fab fa-twitter"></i></a>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="card-bottom">
                            <h5>{{$teams->name}}</h5>
                            <p>{{$teams->designation}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>--}}

   {{--  <section id="page-brand" class="mb-5 py-md-4">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 mb-md-4 text-center">
                    <h6 class="title-text">OUR CLIENTS</h6>
                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <h3 style="border-left: 5px solid #A08D7C; padding-left: 30px;">OUR CLIENTS</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 px-0">
                    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 3000">

                        <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m">
                            @foreach($all_brands as $brand)
                            <li class="text-center">
                                <div class="image">
                                    <img src="{{asset('uploads/logo')}}/{{$brand->logo}}" alt="">
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

                    </div>
                </div>
            </div>
        </div>
    </section>--}}

@endsection