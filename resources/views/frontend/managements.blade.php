@extends('layouts.frontend')

@section('title')
Our Management
@endsection
@section('content')


<!--Category Logo Section Start-->
<!--<section class="py-5 bg-dark">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-12">-->
<!--                <div class="category-content">-->
<!--                      <h3 class="text-white text-center">Management</h3>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--Category Logo Section End-->

<!-- Our Team Section Start -->
    <section id="exclusive-products" class="">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12">
                    <div>
                        <h3 class="text-center">Management</h3>
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
                                                {{-- <a href="#" class="buy-now">Order Now</a> --}}
                                               {{-- <a href="#" class="add-cart">{{$team->designation??''}}</a>--}}
                                            </div>
                                        </div>
                                        <div class="detail-box">
                                            <div class="title">
                                                <h5 style="color:{{$color->color_code}}">{{$team->name}}</h5>
                                            </div>
                                             <div class="pricing_designation">
                                                <h6 class="text-center"  style="color:{{$color->color_code}};font-size: 12px;">({{$team->designation??''}})</h6>
                                            </div> 
                                            <p class="text-justify" style="font-size:14px;">{{ substr($team->description, 0,  60) }} <a href="{{url('/leadership/'.$team->id)}}" class="text-info">Read more...</a></p>
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
    </section>
<!-- Our Team Section End -->

@endsection