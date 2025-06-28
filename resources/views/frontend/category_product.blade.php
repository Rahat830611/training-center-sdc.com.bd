@extends('layouts.frontend')

@section('title')
Category Product
@endsection

@section('css')
<style>
    .view-item{
        padding:3px auto;
    }
    .product-text{
        text-align:center!important;
        color:white;
    }

        /*#header2_mid{*/
        /*    display:none;*/
        /*}*/
    </style>

@endsection

@section('content')

<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">
                    All @if (isset($category_name->business_type)) {{--{{ $category_name->business_type }}--}}@else Items @endif {{(Illuminate\Support\Str::limit($category_name->category_name, 8))}} Products</h2>
       </div>
    </section>

{{-- <!--Category Logo Section Start--> --}}
{{--<section id="category-logo" class="py-5 mt-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="logo">
                    @if(isset($category_name->cat_logo))
                    <img src="{{asset('uploads/category_logo')}}/{{$category_name->cat_logo}}" alt="Logo"/>
                    @endif
                    <p class="ml-3">{{$category_name->category_name}}</p>
                </div>
            </div>
        </div>
    </div>
</section>--}}
{{-- <!---Category Logo Section End---> --}}



<section id="product-categories-alvi" class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <!--<h3 style="color: black;">All @if (isset($category_name->business_type)) {{--{{ $category_name->business_type }}--}}@else Items @endif {{(Illuminate\Support\Str::limit($category_name->category_name, 8))}} Products</h3>
                    <hr style="width:150px; height:3px; background:#333;margin:0 auto;"/>-->
                </div>
            </div>
            <div class="row my-5">
                @php
                  $footer = App\Footer::where('status',0)->first();
                @endphp
                @forelse($products as $product)
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-img">
                                <a href="{{url('product_details')}}/{{$product->id}}"><img src="{{asset('uploads/product')}}/{{$product->image}}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="card-title d-block"  style="background:{{$footer->footer_bg}};">
                                <a href="{{url('product_details')}}/{{$product->id}}"><p>{{ Illuminate\Support\Str::limit($product->product_name, 20)}}</p></a>
                                <!--<div class="view-item rounded" style="background:{{$footer->footer_bg}};">-->
                                <!--    <a href="{{url('product_details')}}/{{$product->id}}" class=" m-5 " >View Details</a>-->
                                <!--</div>-->
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-12 no_product">
	                	<h5>No Items/Services Available</h5>
                </div>
                @endforelse
                
            </div>
            <div class="row">
                <div class="col-lg-12 paginate">
                     {{$products->links()}}
                </div>
            </div>

        </div>
    </section>
@endsection