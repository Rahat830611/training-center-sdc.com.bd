@extends('layouts.frontend')

@section('title')
 Award and Certifications
@endsection

@section('content')

<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">Award and Certifications</h2>
       </div>
</section>

<section id="product-categories" class=" ">
    <div class="container">
        <div class="row my-5">
         
                    @foreach($all_photo as $photo)
                    <div class="col-md-6 my-3">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="card-img">

                                    <div class="award" uk-lightbox="animation: fade">
                                        <a href="{{asset('uploads/logo')}}/{{$photo->logo}}" class="uk-inline"  data-caption="{{$photo->title}}" target="_blank">
                                            <img src="{{asset('uploads/logo')}}/{{$photo->logo}}" class="img-fluid" height="500" alt="">
                                        </a>
                                    </div>

                                </div>
                                @if($photo->title)
                                <div class="card-title d-block">
                                    <p class="text-center" ">{{$photo->title}}</p>
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