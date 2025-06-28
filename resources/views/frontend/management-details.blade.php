@extends('layouts.frontend')

@section('title')
Management Details
@endsection
@section('content')
<!-- Our Team Section Start -->
    <section id="exclusive-products" class="py-4 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-header w-100">
                        <h3 class="" >{{$member->name}} ({{$member->designation}})</h3>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-md-3">
                    <img src="{{asset('uploads/team')}}/{{$member->image}}" alt="1" style="width:200px;border-radius:5px;">
                </div>
                 <div class="col-md-9">
                    <p class="text-justify" style="font-size:20px">{!! $member->description !!}</p>
                </div>
            </div>
        </div>
    </section>
<!-- Our Team Section End -->

@endsection