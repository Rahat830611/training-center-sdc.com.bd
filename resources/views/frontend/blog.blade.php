@extends('layouts.frontend')

@section('title')
Blog
@endsection

    <style>
        /*#header2_mid{*/
        /*    display:none;*/
        /*}*/
    </style>

@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">@if($type == 'blog') News & Events @else Hot Jobs @endif</h2>
       </div>
    </section>
 <section id="page-section" class="my-md-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-8">
                    @foreach($all_blog as $blog)
                    <div class="blog-cart">
                        
                            <div class="blog-image">
                                <a href="{{url('blog_details')}}/{{$blog->id}}">
                                <img class="w-100" src="{{asset('uploads/blog')}}/{{$blog->image}}" alt="">
                                </a>
                            </div>
                            <div class="blog-desc">
                                <div class="blog-title">
                                    <h5><a href="{{url('blog_details')}}/{{$blog->id}}">{{$blog->title}}</a></h5>
                                </div>
                                <div class="blog-date">
                                    <!--<p><strong>Posted On: </strong>{{$blog->created_at->format('d M Y')}}<strong>By: </strong> Admin</p>-->
                                </div>
                                <div class="blog-body">
                                    <p>
                                    {!! Str::limit($blog->short_description, 250) !!}
                                    <span class="readmore"><a href="{{url('blog_details')}}/{{$blog->id}}">Read more</a></span>
                                    </p>
                                </div>
                                <!--<div class="continue-blog">-->
                                <!--    Continue Reading <i class="fas fa-chevron-right"></i>-->
                                <!--</div>-->
                            </div>
                    </div>
                    @endforeach

                </div>
                <div class="col-md-4">
                    <div class="blog-sidebar">
                        <h3>Latest Post</h3>
                        @foreach($all_blog_list as $list)
                        <div class="sidebar-cart">
                            <div class="row">
                                <div class="col-6">
                                    <img src="{{asset('uploads/blog')}}/{{$list->image}}" alt="">
                                </div>
                                <div class="col-6">
                                    <h6>{{ $list->title }}</h6>
                                    <a href="{{url('blog_details')}}/{{$list->id}}">View Post</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection