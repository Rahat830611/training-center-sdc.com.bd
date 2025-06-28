@extends('layouts.dashboard')
@section('title')
Add/Edit Trade
@endsection
@section('trade')
 menu-item-active
@endsection
@section('css')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style>
	label{
		font-weight: bold;
	}
</style>
@endsection
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Dashboard</h5>
                <!--end::Page Title-->
                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5"></h6>
                <!--end::Actions-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Dashboard-->
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-custom">
					 	<div class="card-header">
						    <div class="card-title">
						   		<h3 class="card-label">Update Info</h3>
						    </div>

						    <div class="card-toolbar">
							   	<ul class="nav nav-bold nav-pills ml-auto">
								    <li class="nav-item">
								    	<a href="{{route('tradesinfo.index')}}" class="btn btn-success">View</a>
								    </li>
							   </ul>
							</div>
						</div>
						<div class="card-body">
						  	<div class="row">
						  		<div class="col-lg-10 m-auto">
						  		    @if (session('success'))
                                    <div class="alert alert-primary">
                                        {{ session('success') }}
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
						  		    <form action="{{ @$data ? route('tradesinfo.update', $data->id) : route('tradesinfo.store') }}" class="tradeform" method="POST" enctype="multipart/form-data">
                                    @if (@$data)
                                        @csrf
                                        @method('PUT')
                                    @else
                                        @csrf
                                    @endif
                                        <div class="mb-3 row">
                                            <label for="course" class="col-sm-4 col-form-label">Trade Course</label>
                                            <div class="col-sm-8">
                                                {{--<select class="form-control" name="trade_course">
                                                    <option value="">Select course</option>
                                                    @foreach($all_category as $cat)
                                                    <option value="{{$cat->id}}" {{ $cat->id == @$data->trade_course ? 'selected' : '' }}>{{$cat->category_name}}</option>
                                                    @endforeach
                                                </select>--}}
                                        @php  $all_course = App\Category::orderBy('id','asc')->get(); 
                                    $existingTag = !empty($data->trade_course) ? explode(",", $data->trade_course) : [];
                                    
                                    @endphp
                                                 @foreach($all_category as $cat)
                                                <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" name="trade_course[]" id="category_{{$cat->id}}" value="{{$cat->id}}" {{ (in_array($cat->id,$existingTag)) ? 'checked' : ''}}>
                                          <label class="form-check-label" for="category_{{$cat->id}}">{{$cat->category_name}}</label>
                                        </div>
                                        @endforeach
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label>Position Name</label>
                                                <input type="text" name="position_name" class="form-control" placeholder="Enter Position" value="{{@$data->position_name ?? old('position_name')}}">
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="Name">Name (As per passport MRZ)<span class="required">*</span></label>
                                                    <input type="text" name="name" class="form-control contact-form" placeholder="Enter Your Name" value="{{@$data->name ?? old('name')}}" required >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Father's Name</label>
                                                    <input type="text" name="father_name" value="{{@$data->father_name ?? old('father_name')}}" class="form-control contact-form" placeholder="Enter Your Father Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Mother's Name</label>
                                                    <input type="text" name="mother_name" value="{{@$data->mother_name ?? old('mother_name')}}" class="form-control contact-form" placeholder="Enter Your Mother Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Contact Number <span class="required">*</span></label>
                                                    <input type="text" name="phone" class="form-control contact-form" value="{{@$data->phone ?? old('phone')}}" placeholder="Enter Your Contact No" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="gender">Gender <span class=""></span></label>
                                                    <div class="contact-form">
                                                      <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" {{ @$data->gender == 'male' ? 'checked' : 'checked'}}>
                                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                                      </div>
                                                      <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" {{ @$data->gender == 'female' ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                                      </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="nationality">Nationality</label>
                                                    <input type="text" name="nationality" value="{{@$data->nationality ?? old('nationality')}}" class="form-control contact-form" placeholder="Enter Your Nationality">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="workertype">Date of Birth (Age must be 18 to 45 years old)</label>
                                                    <input type="date" name="dob" value="{{@$data->dob ?? old('dob')}}" id="" class="form-control contact-form">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Birth Registration No. / National ID <span class=""></span></label>
                                                    <input type="text" name="bn_registration_no" class="form-control contact-form" placeholder="Enter Your Birth Registration No. / National ID" value="{{@$data->bn_registration_no ?? old('bn_registration_no')}}" >
                                                </div>
                                            </div>
                                            @if(@$data)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Registration No. <span class=""></span></label>
                                                    <input type="text" name="register_no" class="form-control contact-form" placeholder="Enter Registration No." value="{{@$data->register_no ?? old('register_no')}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Certificate No <span class=""></span></label>
                                                    <input type="text" name="certificate_no" class="form-control contact-form" placeholder="Enter certificate no" value="{{@$data->certificate_no ?? old('certificate_no')}}" readonly>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Passport No. <span class=""></span></label>
                                                    <input type="text" name="passport_no" class="form-control contact-form" value="{{@$data->passport_no ?? old('passport_no')}}" placeholder="Passport No." >
                                                </div>
                                            </div>
                                            @if(!@$data)
                                            <!--<div class="col-md-4">-->
                                            <!--    <div class="form-group">-->
                                            <!--        <label for="">Re-enter Passport No. <span class=""></span></label>-->
                                            <!--        <input type="text" name="passport_confirm" class="form-control contact-form" value="{{old('passport_confirm')}}" placeholder="Re-enter Passport No." >-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            @endif
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Document Country Issue <span class=""></span></label>
                                                    <input type="text" name="document_issues" value="{{@$data->document_issues ?? old('document_issues')}}" class="form-control contact-form" placeholder="Ex. Bangladesh" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Passport Issue Date <span class=""></span></label>
                                                    <input type="date" name="passport_issue_date" value="{{@$data->passport_issue_date ?? old('passport_issue_date')}}" class="form-control contact-form" placeholder="Passport Issue Date" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Passport Expiry Date <span class=""></span></label>
                                                    <input type="date" name="passport_expirary_date" value="{{@$data->passport_expirary_date ?? old('passport_expirary_date')}}" class="form-control contact-form" placeholder="Passport Expiry Date" >
                                                </div>
                                            </div>
                                            @if(@$data)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Training Status</label>
                                                    <select class="form-control" name="training_status">
                                                        <option>Select Status</option>
                                                        <option value="0"{{@$data->training_status == 0 ? 'selected' : ''}}>Pending</option>
                                                        <option value="1" {{@$data->training_status == 1 ? 'selected' : ''}}>Completed</option>
                                                    </select>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="workertype">Worker type</label>
                                                    <select name="worker_type" id="" class="form-control contact-form">
                                                        <option value="Foreign Worker">Foreign Worker</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">ZIP Code</label>
                                                    <input type="text" name="zip_code" value="{{@$data->zip_code ?? old('zip_code')}}" placeholder="Zip Code" class="form-control">
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="workertype">Create Date</label>
                                                    
                                                    <input type="date" name="training_start_date" value="{{@$data->training_start_date ?? old('training_start_date')}}" class="form-control contact-form" >
                                                    <!--<input type="date" name="created_at" value="{{ old('created_at')}}" class="form-control contact-form" >-->

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Completed Date</label>
                                                    <input type="date" name="training_end_date" value="{{@$data->training_end_date ?? old('training_end_date')}}" class="form-control contact-form" >
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="">Address <span class=""></span></label>
                                            <textarea name="address" id="" class="form-control contact-form" cols="5" rows="4" placeholder="Write Your Address" >{{@$data->address ?? old('address')}}</textarea>
                                            
                                        </div>
                                        {{--<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Upload Certificate <span class=""></span></label>
                                                    <input type="file" name="uploadfile">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                @if(@$data)
                                                @if(@$data->file_type == 'pdf')
                                                    <a href="{{asset('uploads/candidate/'.$data->file_name)}}" target="_blank">{{@$data->file_name}}</a>
                                                @else
                                                    <img src="{{asset('uploads/candidate/'.$data->file_name)}}" style="width:200px">
                                                @endif
                                                @endif
                                            </div>
                                        </div> --}}
                                        <div class="form-group ">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                            @if(!@$data)
                                            <button class="btn btn-danger clear-btn" type="button">Clear</button>
                                            @endif
                                        </div>
                                    </form>
						  		</div>
						  	</div>
						</div>
					</div>
                </div>
            </div>
            <!--end::Row-->
            <!--end::Dashboard-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>

@endsection
@section('js')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

{!! Toastr::message() !!}
@if(Session::has('message'))
toastr.options =
{
"closeButton" : true,
"progressBar" : true
}
  toastr.success("{{ session('message') }}");
@endif
@if(Session::has('message'))
toastr.options =
{
"closeButton" : true,
"progressBar" : true
}
  toastr.error("{{ session('message') }}");
@endif
<script>
    $(function () {
            $("#usertable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
    });
</script>
<script type='text/javascript'>
function preview_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('output_image');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
</script>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile-img").change(function(){
            readURL(this);
        });
        $(document).ready(function(){
            $('.clear-btn').on('click', function(){
                $('.tradeform')[0].reset()
            })
        })
</script>
@endsection
