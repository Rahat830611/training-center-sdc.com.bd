@extends('layouts.frontend')

@section('title')
  {{ $course->category_name}}
@endsection


@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title"> {{ $course->category_name}}</h2>
       </div>
    </section>
    <section id="page-section" class="mt-5 mb-4">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-6">
                    <div class="top-image">
                        <img  src="{{asset('uploads/category')}}/{{$course->image}}"/>
                    </div>
                </div>
                <div class="col-md-6">
                    {!!$course->description!!}
                </div>
                @if (isset($course->description_two))
                <div class="col-12 mt-2">
                    {!!$course->description_two!!}
                </div>
                @endif
            </div>
        </div>
    </section>


<!-- Our Products Section Start -->

<section id="related-products" class="pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <div class="product-header">
                    <h3 class="">Our All Trade Courses</h3>
                </div>
            </div>
            <div class="br"></div>
        </div>

        <div class="row pt-4 pt-md-5">
            <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 3000">

                <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m">
                    @foreach($related_course as $course)
                    <li>
                        <div class="box">
                            <div class="slide-img">
                                <img class="gallery-img" src="{{asset('uploads/category')}}/{{$course->image}}" alt="1">
                                
                                <div class="overlay">
                                    <a href="{{url('course-details')}}/{{$course->id}}" class="add-cart"> View Details</a>
                                </div>
                            </div>
                            <div class="detail-box">
                                <div class="title factory">
                                    <a href="{{url('course-details')}}/{{$course->id}}"><h5>{{$course->category_name??''}}</h5></a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

            </div>
        </div>
    </div>
</section>

@endsection