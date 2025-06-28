@extends('layouts.frontend')

@section('title')
Products
@endsection
@section('content')

    <style>
        /*#header2_mid{*/
        /*    display:none;*/
        /*}*/
    </style>

<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">  @if($category)
                    {{$category->category_name}}
                    @endif
                    @if($subcategory)
                    {{$subcategory->title}}
                    @endif
                    @if($childCategory)
                    {{$childCategory->title}}
                    @endif
                    All Products</h2>
       </div>
    </section>

<section id="product-categories" class="pt-1 my-md-3 my-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-center">
                        @if($category)
                        {{$category->description}}
                        @endif
                        @if($subcategory)
                        {{$subcategory->description}}
                        @endif
                    </p>
                </div>
            </div>
            <div class="row my-3">
                @forelse($products as $product)
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div class="card-body pb-0">
                            <a href="{{url('product_details')}}/{{$product->id}}">
                            <div class="card-img">
                                <img src="{{asset('uploads/product')}}/{{$product->image}}" class="img-fluid" alt="">
                            </div>
                            </a>
                            <div class="card-title d-block">
                                <a href="{{url('product_details')}}/{{$product->id}}"><p class="text-center ">{{$product->product_name}}</p></a>
                             {{--   <a href="{{url('product_details')}}/{{$product->id}}" class="btn btn-block">Show More</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-12 no_product">
	                	<h5>No Product Available</h5>
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