@extends('layouts.dashboard')
@section('title')
Header 
@endsection
@section('header')
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Add Header</h6>
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
						   		<h3 class="card-label">Create New Header</h3>
						    </div>

						    <div class="card-toolbar">
							   	<ul class="nav nav-bold nav-pills ml-auto">
								    <li class="nav-item">
								    	<a href="{{url('admin/view/header')}}" class="btn btn-success">View</a>
								    </li>
							   </ul>
							</div>
						</div>
						<div class="card-body">
						  	<div class="row">
						  		<div class="col-lg-10 m-auto">
						  			<form action="{{url('admin/post/header')}}" method="POST" enctype="multipart/form-data">
						  				@csrf
						  				<div class="form-group">
										    <label>Header Title:</label>
										    <input type="text" name="header_title" class="form-control" placeholder="Enter full Header Title"/>
										    <span class="form-text text-muted">Please enter your full Header Title</span>
										</div>
										<div class="form-group">
										    <label>Header Phone Number:</label>
										    <input type="text" name="mobile" class="form-control" placeholder="Enter full Header Phone Number"/>
										    <span class="form-text text-muted">Please enter your Header Phone Number</span>
										</div>
										<div class="form-group">
										    <label>Social Facebook Link:</label>
										    <input type="text" name="facebook" class="form-control" placeholder="Enter full Social Facebook Link"/>
										    <span class="form-text text-muted">Please enter your Social Facebook Link</span>
										</div>
										<div class="form-group">
										    <label>Social Twitter Link:</label>
										    <input type="text" name="twitter" class="form-control" placeholder="Enter full Social Twitter Link"/>
										    <span class="form-text text-muted">Please enter your Social Twitter Link</span>
										</div>
										<div class="form-group">
										    <label>Social Instragram Link:</label>
										    <input type="text" name="instragram" class="form-control" placeholder="Enter full Social Instragram Link"/>
										    <span class="form-text text-muted">Please enter your Social Instragram Link</span>
										</div>
										<div class="form-group">
										    <label>Social WhatsApp Link:</label>
										    <input type="text" name="whatsapp" class="form-control" placeholder="Enter full Social WhatsApp Link"/>
										    <span class="form-text text-muted">Please enter your Social WhatsApp Link</span>
										</div>
										<div class="form-group">
										    <label>Header Logo</label>
										    <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile" name="image" id="profile-img" onchange="preview_image(event)"/>
												<label class="custom-file-label" for="customFile">Choose file</label>
												<img src="" id="output_image" width="200px" style="padding-top: 5px;" />
											</div>
										</div>
										<div class="form-group" style="text-align: end;">
											<button type="submit" class="btn btn-primary">Submit</button>
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
</script>
@endsection
