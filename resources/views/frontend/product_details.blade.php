@extends('layouts.frontend')

@section('title')
Product Details
@endsection

@section('css')
    <style>
        /*#header2_mid{*/
        /*    display:none;*/
        /*}*/
    </style>
@endsection

@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">Product Details</h2>
       </div>
    </section>
<section id="product-details" class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-img">
                        <img src="{{asset('uploads/product')}}/{{$product->image}}" class="img-responsive" alt="" width="100%">
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="product-detail">
                        <div class="product-name">
                            <h3>{{$product->product_name??''}}</h3>
                        </div>
                         {{-- <div class="product-code">
                            <p>Product Code: &nbsp;{{$product->product_code??''}}</p>
                        </div> --}}
                        <div class="row mt-4 mb-2">
                            {{-- <div class="col-md-6">
                                <div class="product-review d-flex">
                                    <p>12 REVIEWS</p>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half"></i>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6 text-muted product-nav">
                                <span>HOME</span> / <span>MENS</span> / <span class="text-muted">SHIRT NAME</span>
                            </div> --}}
                        </div>
                        <!-- <div class="product-price">
                            <h5>$ 45</h5>
                        </div> -->
                        <!-- <div class="product-wishlist">
                            <a href="#"><i class="fas fa-star"></i> ADD TO WISHLIST</a>
                        </div> -->
                       <div class="product-description">
                            <h4>DESCRIPTION</h4>
                            <p>{!!$product->description??''!!}</p>
                        </div>
                         {{-- <div class="product-size">
                            <div class="product-size-title">
                                <h6>Select Size:</h6>
                            </div>
                            <button type="checkbox">S</button>
                            <button type="checkbox">M</button>
                            <button type="checkbox">L</button>
                            <button type="checkbox">XL</button>
                        </div>  --}}
                        <div class="cart-buy">
                            <a class="addcart" href="{{url('contact_us')}}/{{$product->id}}">SUBMIT QUERY</a>
                            <!-- <a class="buynow" href="#">BUY NOW</a> -->
                        </div>
                         {{-- <div class="sku-cat-tag">
                            <p><strong>SKU: </strong> MPC34251</p>
                            <p><strong>CATEGORY: </strong> SHIRTS</p>
                            <p><strong>TAGS: </strong> BASIC, CASUAL, COTTON, GREY, MEN</p>
                        </div>  --}}
                        {{--<div class="social-share">
                            <div class="share-with">
                                <h6>Share With:</h6>
                            </div>
                            <a href="{{$header->facebook}}" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="{{$header->twitter}}" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="{{$header->instragram}}" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="{{$header->whatsapp}}" title="Whatsapp"><i class="fab fa-whatsapp"></i></a>
                        </div>--}}
                    </div>
                </div>

                <div class="col-md-1"></div>
            </div>
        </div>
    </section>
<!-- Product Details End -->

<!-- Our Products Section Start -->
@if($related_product->count()>3)
<section id="related-products" class="py-1 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <div class="product-header">
                    <h3 class="">Related Products</h3>
                </div>
            </div>
            <div class="br"></div>
        </div>

        <div class="row pt-4 pt-md-5">
            <div class="uk-position-relative uk-visible-toggle" tabindex="-1" uk-slider="autoplay: true; autoplay-interval: 3000">

                <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@s uk-child-width-1-4@m">
                    @foreach($related_product as $product)
                    <li>
                        <div class="box">
                            <div class="slide-img">
                                <img src="{{asset('uploads/product')}}/{{$product->image}}" alt="1">
                                <div class="overlay">
                                    <a href="{{url('product_details')}}/{{$product->id}}" class="add-cart">View Details</a>
                                </div>
                            </div>
                            <div class="detail-box">
                                <div class="title factory">
                                    <a href="{{url('product_details')}}/{{$product->id}}"><h5>{{$product->product_name??''}}</h5></a>
                                </div>

                                {{-- <div class="pricing">
                                    <h6>$ {{$product->price}}</h6>
                                </div> --}}
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
@else
   <section id="product-categories" class="pt-5 my-md-5 my-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 style="color:{{$color->color_code}}">Related Product</h3>
                </div>
            </div>
            <div class="br"></div>
            <div class="row my-5">
                @foreach($related_product as $product)
                <div class="col-md-3 my-2">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="card-img">
                                <a href="{{url('product_details')}}/{{$product->id}}"><img src="{{asset('uploads/product')}}/{{$product->image}}" class="img-fluid" alt=""></a>
                            </div>
                            <div class="factory d-block">
                                <a href="{{url('product_details')}}/{{$product->id}}"><p >{{ Illuminate\Support\Str::limit($product->product_name, 15)}}</p></a>
                                <div class="view-items">
                                    {{-- <a href="{{url('product_details')}}/{{$product->id}}" class="btn btn-block">View Details</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection