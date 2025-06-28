@extends('layouts.dashboard')
@section('title')
About Us 
@endsection
@section('aboutus')
 menu-item-active
@endsection
@section('css')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" /> --}}
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">About Us</h6>
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
						   		<h3 class="card-label">About Us Section</h3>
						    </div>

						    <div class="card-toolbar">
							   	<ul class="nav nav-bold nav-pills ml-auto">
								    <li class="nav-item">
								    	 <!-- Add Logo-->
					                    <a href="{{url('/admin/aboutus/view')}}" class="btn btn-primary">View All</a>
								    </li>
							   </ul>
							</div>
						</div>
						<div class="card-body">
						  	<form action="{{url('admin/update/aboutus')}}" method="POST" enctype="multipart/form-data">
						  		@csrf
						  		{{-- <div class="form-group">
						  			 <label>Description</label>
                					<textarea id="summernote" name="content">{!!$data->content!!}</textarea>
                                    <input type="hidden" name="id" value="{{$data->id}}">
						  		</div> --}}
                                <div class="form-group">
                                     <label>Description One</label>
                                    <textarea name="description_one" id="summernote" rows="4" cols="4" class="form-control">{{$data->description_one}}</textarea>
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                </div>
                                <div class="form-group">
                                     <label>Description Two</label>
                                    <textarea name="description_two" id="summernotetwo" rows="4" cols="4" class="form-control">{{$data->description_two}}</textarea>
                                </div>
                                <div class="form-group">
                                     <label>Photo</label>
                                    <input type="file" name="image" class="form-control">
                                    <img src="{{asset('uploads/aboutus')}}/{{$data->image}}" width="200px" alt="">
                                </div>
                                
                                <h3>Feature Section</h3>
                                 <div class="row">
                                     <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="bg_color" class="d-flex">Background Color   <p class="ml-5" style="background:{{$data->bg_color}};height: 20px; width: 20px;border: 1px solid blue; border-radius: 3px;"></p></label>
                                            <input type="text" name="bg_color" class="form-control" value="{{$data->bg_color}}" placeholder="Enter bg_color class">
                                           
                                        </div>
                                     </div>
                                 </div>
                                 <h5>Feature One</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="feature1_icon">Icon Class</label>
                                            <input type="text" name="feature1_icon" id="feature1_icon" class="form-control" value="{{$data->feature1_icon}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="feature1_title">Title </label>
                                            <input type="text" name="feature1_title" id="feature1_title" class="form-control" value="{{$data->feature1_title}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="feature1_description"> Desctiption</label>
                                            <input type="text" name="feature1_description" id="feature1_description" class="form-control" value="{{$data->feature1_description}}" >
                                        </div>
                                    </div>
                                </div>
                                 <h5>Feature Two</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="feature2_icon">Icon Class</label>
                                            <input type="text" name="feature2_icon" id="feature2_icon" class="form-control" value="{{$data->feature2_icon}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="feature2_title">Title </label>
                                            <input type="text" name="feature2_title" id="feature2_title" class="form-control" value="{{$data->feature2_title}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="feature2_description"> Desctiption</label>
                                            <input type="text" name="feature2_description" id="feature2_description" class="form-control" value="{{$data->feature2_description}}" >
                                        </div>
                                    </div>
                                </div>
                                 <h5>Feature Three</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="feature3_icon">Icon Class</label>
                                            <input type="text" name="feature3_icon" id="feature3_icon" class="form-control" value="{{$data->feature3_icon}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="feature3_title">Title </label>
                                            <input type="text" name="feature3_title" id="feature3_title" class="form-control" value="{{$data->feature3_title}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="feature3_description"> Desctiption</label>
                                            <input type="text" name="feature3_description" id="feature3_description" class="form-control" value="{{$data->feature3_description}}" >
                                        </div>
                                    </div>
                                </div>
                                 <h3>Client Section</h3>
                                 <div class="row">
                                     <div class="col-md-4">
                                        <div class="form-group">
                                             <label for="bg_color" class="d-flex">Background Image  </label>
                                            <input type="file" name="client_bg_img" class="form-control" value="{{$data->client_bg_img}}">
                                           
                                        </div>
                                     </div>
                                      <div class="col-md-2">
                                        <div class="form-group">
                                            <img class="w-100" src="{{asset('uploads/aboutus')}}/{{$data->client_bg_img}}"/>
                                        </div>
                                     </div>
                                     <div class="col-md-6">
                                        <div class="form-group">
                                             <label for="client_title">Title </label>
                                            <input type="text" name="client_title" class="form-control" value="{{$data->client_title}}">
                                           
                                        </div>
                                     </div>
                                     <div class="col-md-12">
                                        <div class="form-group">
                                             <label for="client_description">Description  </label>
                                           <textarea type="text" name="client_description" class="form-control">{{$data->client_description}}</textarea>
                                        </div>
                                     </div>
                                 </div>
                                
						  		<div class="form-group">
						  			<button type="submit" class="btn btn-primary">Submit</button>
						  		</div>
						  	</form>
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
{{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{asset('dashboard_assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
<script type="text/javascript">
	
	$(document).ready(function() { 
		$("#nameid").select2({
			placeholder:"search here",
			allowClear:true,
		}); 
	});
</script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
 <script type="text/javascript">
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 250,
            });
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#summernotetwo').summernote({
                height: 250,
            });
        });

    </script>
@endsection
