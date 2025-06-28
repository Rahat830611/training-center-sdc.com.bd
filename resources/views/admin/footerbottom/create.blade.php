@extends('layouts.dashboard')
@section('title')
Footer Bottom
@endsection
@section('footer_bottom')
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Add Footer Bottom</h6>
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
						   		<h3 class="card-label">Create New Footer Bottom</h3>
						    </div>

						    <div class="card-toolbar">
							   	<ul class="nav nav-bold nav-pills ml-auto">
								    <li class="nav-item">
								    	<a href="{{url('admin/view/footer_bottom')}}" class="btn btn-success">View</a>
								    </li>
							   </ul>
							</div>
						</div>
						<div class="card-body">
						  	<div class="row">
						  		<div class="col-lg-10 m-auto">
						  			<form action="{{url('admin/post/footer_bottom')}}" method="POST" enctype="multipart/form-data">
						  				@csrf
						  				<div class="form-group">
										    <label>Footer Bottom Icon:</label>
										    <input type="text" name="icon" class="form-control" placeholder="Enter full Footer Bottom Icon"/>
										    <span class="form-text text-muted">Please enter your Footer Bottom Icon</span>
										</div>
						  				<div class="form-group">
										    <label>Footer Bottom Title:</label>
										    <input type="text" name="title" class="form-control" placeholder="Enter full Footer Bottom Title"/>
										    <span class="form-text text-muted">Please enter your Footer Bottom Title</span>
										</div>
						  				<div class="form-group">
										    <label>Footer Bottom Short Description:</label>
										    <textarea class="form-control" name="short_description" id="" cols="3" rows="4" placeholder="Footer Bottom Short Description"></textarea>
										    <span class="form-text text-muted">Please enter your Footer Short Description</span>
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
