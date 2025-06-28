@extends('layouts.frontend')

@section('title')
Our Clients
@endsection

    <style>
        /*#header2_mid{*/
        /*    display:none;*/
        /*}*/
    </style>

@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">Our clients</h2>
       </div>
    </section>
    <section id="page-section" class="my-md-5">
        <div class="container py-3">
            <!--<div class="row">-->
            <!--    <div class="col-12 mb-3 mb-md-4 text-center">-->
            <!--        <h3  class="text-center">OUR CLIENTS</h3>-->
            <!--    </div>-->
            <!--</div>-->
            <br>
            <div class="row">
                @foreach($all_brands as $brand)
                  <div class="col-md-2 col-sm-4 my-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img">
                                <img class="client-img" src="{{asset('uploads/logo')}}/{{$brand->logo}}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
        </div>
    </section>
<!-- Brand Section End -->

@endsection