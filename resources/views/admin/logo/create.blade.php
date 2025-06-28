@extends('layouts.dashboard')

@section('title')
  Award and Certifications
@endsection

@section('brand')
menu-item-active
@endsection

@section('css')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Award and Certifications</h6>
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
						   		<h3 class="card-label">All Award List</h3>
						    </div>

						    <div class="card-toolbar">
							   	<ul class="nav nav-bold nav-pills ml-auto">
								    <li class="nav-item">
								    	 <!-- Add Logo-->
					                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
					                        <i class="flaticon2-plus-1 icon-lg"></i> Add New Award
					                    </button>

					                    <!-- Modal-->
					                    <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
					                        <div class="modal-dialog" role="document">
					                            <div class="modal-content">
					                                <div class="modal-header">
					                                    <h5 class="modal-title" id="exampleModalLabel">Create New Award</h5>
					                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                                        <i aria-hidden="true" class="ki ki-close"></i>
					                                    </button>
					                                </div>
					                                <div class="modal-body">
                					                   
					                                   	<form action="{{url('admin/post/logo')}}" method="POST" enctype="multipart/form-data">
					                                   		@csrf
					                                   		<div class="form-group" >
                    										    <label>Award/Certificate Title:</label>
                    										    <input type="text" name="title" class="form-control" placeholder="Enter your award title">
                    										</div>
					                                   		<div class="form-group">
																<label>Award Photo</label>
																<div></div>
																<div class="custom-file">
																	<input type="file" class="custom-file-input" id="customFile" name="logo" id="profile-img"/>
																	<label class="custom-file-label" for="customFile">Choose file</label>
																	<img src="" id="profile-img-tag" width="200px" style="padding-top: 5px;" />
																</div>
															</div>
															<div class="form-group">
																<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
					                                    		<button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
															</div>
														</form>
					                                </div>
					                            		
					                            </div>
					                        </div>
					                    </div>
								    </li>
							   </ul>
							</div>
						</div>
						<div class="card-body">
						  	<!--begin: Search Form-->
										<!--begin: Datatable-->
										<table id="usertable" class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>Order ID</th>
													<th>Title</th>
													<th>Photo</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												@php
													$i = 1;
												@endphp
												@foreach($all_logo as $logo)
												<tr>
													<td>{{$i++}}</td>
													<td>{{$logo->title}}</td>
													<td style="background: #555555;"><img src="{{asset('uploads/logo')}}/{{$logo->logo}}" alt="" width="80px;"></td>
													<td>
														@if($logo->status == 0)
														<a href="#statusModal{{$logo->id}}" data-toggle="modal" class="btn btn-success"  ><i class="fas fa-toggle-off icon-md"></i>Active
					                                    </a>
														@else
														<a href="#statusModal{{$logo->id}}" data-toggle="modal" class="btn btn-danger"  ><i class="fas fa-toggle-on icon-md"></i></i> Deactive
					                                    </a>
														@endif
													</td>
													<td>
					                                    <a href="#editModal{{$logo->id}}" data-toggle="modal" class="btn btn-warning"  ><i class="flaticon2-edit icon-lg"></i> Edit
					                                    </a>
					                                    <a href="#deleteModal{{$logo->id}}" data-toggle="modal" class="btn btn-danger"><i class="flaticon2-rubbish-bin-delete-button icon-lg"></i> Delete
					                                    </a>
													</td>
											</tr>
<!-- Status Update -->
<div class="modal fade" id="statusModal{{$logo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">

            </div>
            <div class="modal-body m-auto">
                <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure for Change Status?</h5>
            </div>
            <div class="modal-footer">
            	@if($logo->status == 0)
                <a href="{{url('admin/logo/status')}}/{{$logo->id}}" class="btn btn-danger">Deactive</a>
                @else
                <a href="{{url('admin/logo/status')}}/{{$logo->id}}" class="btn btn-danger">Active</a>
                @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Delete -->
<div class="modal fade" id="deleteModal{{$logo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">

            </div>
            <div class="modal-body m-auto">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete ?</h5>
            </div>
            <div class="modal-footer">
                <a href="{{url('admin/logo/delete')}}/{{$logo->id}}" class="btn btn-danger">Delete</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade " id="editModal{{$logo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">
                <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to Edit ?</h5>
                <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-body">
                <form action="{{url('admin/update/logo')}}" method="POST" enctype="multipart/form-data">
	           		@csrf
	           		<div class="form-group" >
                		<label>Award/Certificate Title:</label>
                		<input type="text" name="title" class="form-control" value="{{$logo->title}}">
                	</div>
	           		<div class="form-group">
						<label>Award Photo</label>
						<div></div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="customFile" name="logo" id="profile-img"/>
							<input type="hidden" class="custom-file-input" id="customFile" name="id" id="profile-img" value="{{$logo->id}}" />
							<label class="custom-file-label" for="customFile">Choose file</label>
							<img src="" id="profile-img-tag" width="200px" style="padding-top: 5px;" />
						</div>
						<div>
							<img src="{{asset('uploads/logo')}}/{{$logo->logo}}" width="100px;" alt="">
						</div>
					</div>
					<div class="form-group">
						<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
	            		<button type="submit" class="btn btn-primary font-weight-bold">Update</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>
												@endforeach
											</tbody>
										</table>
										<!--end: Datatable-->
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
