@extends('layouts.frontend')

@section('title')
Contact Us
@endsection

@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">Contact  Us</h2>
       </div>
    </section>
<!-- Brand Section Start -->
    <section id="page-section" class="my-md-5">
        <div class="container py-3">
        
            <div class="row">
                <div class="col-lg-6 contact">
                    <h4>SDC Overseas Technical Training & Testing Center Ltd</h4>
                    <address>
                        House #90, Block-C ,Thana Road, <br/> (Near Turag Puraton Thana) <br/> 
                        Dhour <br/>
                        Turag, Dhaka-1230<br/>
                        Email: sdccenterbd@gmail.com<br/>
                        Phone: +88 01911 941194<br/>
                    </address>
                  
                    <h4>If you have any questions, inquiries, or require assistance, please don't hesitate to reach out to us. Our team is ready to help you.</h4>
                    
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
                                <textarea name="message" id="" class="form-control contact-form" cols="5" rows="4" placeholder="Write Your Message"></textarea>
                                @error('message')
                                <div class="alert alert-danger">
                                    <strong>{{$message}}</strong>
                                </div>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <button class="btn contact-form contact-btn" type="submit">Send Message</button>
                            </div>
                        </form>
                        <h4>We value your feedback and are committed to providing you with excellent service.</h4>
                    </div>
                </div>
                <div class="col-lg-6 contact">
                     <p>You can also use the contact form on our website to send us a message. Simply fill out the required fields, and we will get back to you as soon as possible.
<br/>
https://sdc.com.bd/contact-us
</p>
<h4>
Please note that you should have an actual contact form on your website where users can input their details and inquiries. You can include the link to the contact form above if it's available on your website. Additionally, feel free to customize this section to better suit your branding and website design.</h4>
                    <div class="contact_map">
                        <iframe class="rounded" src="{{App\Footer::where('status',0)->first()->map_url}}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Brand Section End -->

@endsection