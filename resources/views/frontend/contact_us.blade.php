@extends('layouts.frontend')

@section('title')
 Submit Query
@endsection

@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title"> Submit Query</h2>
       </div>
    </section>
<!-- Brand Section Start -->
    <section id="page-section" class="my-md-5">
        <div class="container py-3">

            <div class="row">
                <div class="col-lg-6 contact">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{session('success')}}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="contact_form">
                        <form action="{{url('send_message')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="name" class="form-control contact-form" placeholder="Enter Your Name">
                                @error('name')
                                <div class="alert alert-danger">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control contact-form" placeholder="Enter Your Phone">
                                @error('phone')
                                <div class="alert alert-danger">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control contact-form" placeholder="Enter Your Email">
                                @error('email')
                                <div class="alert alert-danger">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Message</label>
                                <textarea name="message" id="" class="form-control contact-form" cols="5" rows="4" placeholder="Write Your Message">Product Name: {{$product_name->product_name}}</textarea>
                                @error('message')
                                <div class="alert alert-danger">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <button class="btn contact-form contact-btn" type="submit">Send Query</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 contact">
                    <div class="contact_map">
                        <iframe class="rounded" src="{{App\Footer::where('status',0)->first()->map_url}}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Brand Section End -->

@endsection