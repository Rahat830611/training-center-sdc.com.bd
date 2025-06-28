@extends('layouts.frontend')

@section('title')
 Register
@endsection

@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">Worker Details</h2>
       </div>
    </section>
<!-- Brand Section Start -->
    <section id="page-section" class="my-md-5">
        <div class="container py-3">

            <div class="row">
                <div class="col-lg-10 m-auto contact">
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{session('success')}}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if(count($errors) > 0 )
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <ul class="p-0 m-0" style="list-style: none;">
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="contact_form">
                        <form action="{{url('store-info')}}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                            <label for="course" class="col-sm-4 col-form-label">Trade Course</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="trade_course">
                                        <option value="">Select course</option>
                                        @foreach($all_category as $cat)
                                        <option value="{{$cat->id}}" {{ $cat->id == @$id ? 'selected' : '' }}>{{$cat->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="Name">Name (As per passport MRZ)<span class="required">*</span></label>
                                        <input type="text" name="name" class="form-control contact-form" placeholder="Enter Your Name" value="{{old('name')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Father's Name</label>
                                        <input type="text" name="father_name" value="{{old('father_name')}}" class="form-control contact-form" placeholder="Enter Your Father Name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Mother's Name</label>
                                                    <input type="text" name="mother_name" value="{{old('mother_name')}}" class="form-control contact-form" placeholder="Enter Your Mother Name">
                                                </div>
                                            </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Contact Number <span class="required">*</span></label>
                                        <input type="text" name="phone" class="form-control contact-form" value="{{old('phone')}}" placeholder="Enter Your Contact No" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gender">Gender <span class=""></span></label>
                                        <div class="contact-form">
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" >
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                          </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nationality">Nationality</label>
                                        <input type="text" name="nationality" value="{{old('nationality')}}" class="form-control contact-form" placeholder="Enter Your Nationality">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="workertype">Date of Birth (Age must be 18 to 45 years old)</label>
                                        <input type="date" name="dob" value="{{old('dob')}}" id="" class="form-control contact-form">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Birth Registration No. / National ID <span class=""></span></label>
                                        <input type="text" name="bn_registration_no" class="form-control contact-form" placeholder="Enter Your Birth Registration No. / National ID" value="{{old('bn_registration_no')}}" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Passport No. <span class=""></span></label>
                                        <input type="text" name="passport_no" class="form-control contact-form" value="{{old('passport_no')}}" placeholder="Passport No." >
                                    </div>
                                </div>
                                {{--<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Re-enter Passport No. <span class=""></span></label>
                                        <input type="text" name="passport_confirm" class="form-control contact-form" value="{{old('passport_confirm')}}" placeholder="Re-enter Passport No." >
                                    </div>
                                </div>--}}
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Passport Issue Date <span class=""></span></label>
                                        <input type="date" name="passport_issue_date" value="{{old('passport_issue_date')}}" class="form-control contact-form" placeholder="Passport Issue Date" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Passport Expiry Date <span class=""></span></label>
                                        <input type="date" name="passport_expirary_date" value="{{old('passport_expirary_date')}}" class="form-control contact-form" placeholder="Passport Expiry Date" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="workertype">Worker type</label>
                                        <select name="worker_type" id="" class="form-control contact-form">
                                            <option value="Foreign Worker">Foreign Worker</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Document Country Issue <span class=""></span></label>
                                        <input type="text" name="document_issues" value="{{old('document_issues')}}" class="form-control contact-form" placeholder="Ex. Bangladesh" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">ZIP Code</label>
                                        <input type="text" name="zip_code" value="{{old('zip_code')}}" placeholder="Zip Code" class="form-control">
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                                <label for="">Address <span class=""></span></label>
                                <textarea name="address" id="" class="form-control contact-form" cols="5" rows="4" placeholder="Write Your Address">{{old('address')}}</textarea>
                                
                            </div>
                            <div class="form-group ">
                                <button class="btn contact-form contact-btn" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Brand Section End -->

@endsection