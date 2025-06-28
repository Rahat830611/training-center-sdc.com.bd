@extends('layouts.frontend')
@section('title')
Compliance
@endsection

    <style>
        /*#header2_mid{*/
        /*    display:none;*/
        /*}*/
    </style>

@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">Compliance </h2>
       </div>
    </section>
    <section id="page-section" class="my-md-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="top-image">
                        <img  src="{{asset('uploads/page')}}/{{$compliance->image}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    {!!$compliance->description!!}
                </div>
                @if (isset($compliance->description_two))
                <div class="col-12 mt-5">
                    <!--<p style="font-size:18px;">    Our unique vision , mission and values capture the essence of who we are and how we interact with one another. In addition, it speaks to how we go  to market and our commitment to delivering excellence to our customer.</p>-->
                    {!!$compliance->description_two!!}
                </div>
                @endif
            </div>
        </div>
        {{-- <div class="container complaince_sec">
            <div class="row">

            <div class="col-md-2">
                <div class="top-image">
                    <img src="assets/img/6.jpg">
                </div>
            </div> <br>
            <div class="col-md-2">
                <div class="top-image">
                    <img src="assets/img/GFPET2.png">
                </div>
            </div> <br>
            <div class="col-md-2">
                <div class="top-image">
                    <img src="assets/img/ico-logo-padded3.png">
                </div>
            </div> <br>
            <div class="col-md-2">
                <div class="top-image">
                    <img src="assets/img/mango8.png">
                </div>
            </div> <br>
            <div class="col-md-2">
                <div class="top-image">
                    <img src="assets/img/marisa4.png">
                </div>
            </div> <br>
            <div class="col-md-2">
                <div class="top-image">
                    <img src="assets/img/pull-bear6.png">
                </div>
            </div>

        </div> --}}
    </div>
    </section>

    <!-- Brand Section Start -->
    {{-- <section id="brand-section-two" class="py-5 mt-md-4" style="background-image: url({{asset('assets/img/bg-parallax3.jpg')}})">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>SHOP BRANDS</h2>
                    <p>Our prime objective is to build a transparent bridge between our customers and us for building and maintaining a long-term relationship.</p>
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
    </section> --}}
    <!-- Brand Section End -->



@endsection