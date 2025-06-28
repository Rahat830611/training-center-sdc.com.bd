@extends('layouts.frontend')

@section('title')
 Gallery
@endsection

@section('content')

<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">Skill Training</h2>
       </div>
</section>

<section id="product-categories" class=" ">
    <div class="container">
        <div class="row my-5">
          @if($page)
            <div class="col-md-12 mb-3">
                <div>
                    {!!$page->description!!}
                </div>
            </div>
            @endif
        </div>
        <div class="row my-3">
            <h2 class="text-center mb-4">Our courses</h2>
            @foreach($all_category as $course)
            <div class="col-md-3 my-2">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="card-img">

                                    <div uk-lightbox="animation: fade">
                                        <a href="{{asset('uploads/category')}}/{{$course->image}}" class="uk-inline"  data-caption="{{$course->category_name}}" target="_blank">
                                            <img src="{{asset('uploads/category')}}/{{$course->image}}" class="img-fluid" height="500" alt="">
                                        </a>
                                    </div>

                                </div>
                                @if($course->category_name)
                                <div class="card-title d-block">
                                    <p class="text-center" style="color:{{$color->color_code}}">{{$course->category_name}}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
        <div class="row my-5">
             <h2 class="text-center mb-4">Our Gallery</h2>
                    @foreach($all_photo as $photo)
                    <div class="col-md-3 my-2">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="card-img">

                                    <div uk-lightbox="animation: fade">
                                        <a href="{{asset('uploads/gallery')}}/{{$photo->image}}" class="uk-inline"  data-caption="{{$photo->title}}" target="_blank">
                                            <img src="{{asset('uploads/gallery')}}/{{$photo->image}}" class="img-fluid" height="500" alt="">
                                        </a>
                                    </div>

                                </div>
                                @if($photo->title)
                                <div class="card-title d-block">
                                    <p class="text-center" style="color:{{$color->color_code}}">{{$photo->title}}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
         
        </div>
    </div>
</section>
<!-- Product Subcategory Section End -->

@endsection