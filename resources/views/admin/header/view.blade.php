
@extends('layouts.dashboard')
@section('title')
Header List
@endsection
@section('header')
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Header</h6>
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
                                <h3 class="card-label">All Header List</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                        <!-- Add Logo-->
                                        {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
					                        <i class="flaticon2-plus-1 icon-lg"></i> Add New Header
					                    </button>--}}

                                        <!-- Modal-->
                                        <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Create New Header</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('admin/post/header')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Header Title:</label>
                                                                <input type="text" name="header_title" class="form-control" placeholder="Enter full Header Title" />
                                                                <span class="form-text text-muted">Please enter your full Header Title</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Header Phone Number:</label>
                                                                <input type="text" name="mobile" class="form-control" placeholder="Enter full Header Phone Number" />
                                                                <span class="form-text text-muted">Please enter your Header Phone Number</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Social Facebook Link:</label>
                                                                <input type="text" name="facebook" class="form-control" placeholder="Enter full Social Facebook Link" />
                                                                <span class="form-text text-muted">Please enter your Social Facebook Link</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Social Twitter Link:</label>
                                                                <input type="text" name="twitter" class="form-control" placeholder="Enter full Social Twitter Link" />
                                                                <span class="form-text text-muted">Please enter your Social Twitter Link</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Social Instragram Link:</label>
                                                                <input type="text" name="instragram" class="form-control" placeholder="Enter full Social Instragram Link" />
                                                                <span class="form-text text-muted">Please enter your Social Instragram Link</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Social WhatsApp Link:</label>
                                                                <input type="text" name="whatsapp" class="form-control" placeholder="Enter full Social WhatsApp Link" />
                                                                <span class="form-text text-muted">Please enter your Social WhatsApp Link</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Header Logo</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="customFile" name="image" id="profile-img" onchange="preview_image(event)" />
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
                                        <th>SL NO.</th>
                                        <th>Header Title</th>
                                        <th>Phone</th>
										<th>Email</th>
                                        <th>Logo</th>
                                        {{-- <th>Status</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($all_header as $header)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$header->header_title}}</td>
                                        <td>{{$header->mobile}}</td>
                                        <td>{{$header->email}}</td>
                                        <td><img src="{{asset('uploads/header')}}/{{$header->image}}" alt="" width="80px;"></td>
                                        {{-- <td>
                                            @if($header->status == 1)
                                            <a href="#statusModal{{$header->id}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-toggle-off icon-md"></i>Deactive
                                            </a>
                                            @else
                                            <a href="#statusModal{{$header->id}}" data-toggle="modal" class="btn btn-success"><i class="fas fa-toggle-on icon-md"></i></i> Active
                                            </a>
                                            @endif
                                        </td> --}}
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-warning" href="#showModal{{$header->id}}" data-toggle="modal"><i class="flaticon-eye icon-lg"></i>&nbsp;&nbsp;Show
                                                    </a>
                                                    <a class="dropdown-item text-warning" href="#editModal{{$header->id}}" data-toggle="modal"><i class="flaticon2-edit icon-lg"></i>&nbsp;&nbsp;Edit
                                                    </a>
                                                    {{--<a class="dropdown-item text-danger" href="#deleteModal{{$header->id}}" data-toggle="modal"><i class="flaticon2-rubbish-bin-delete-button icon-lg"></i> &nbsp;&nbsp;Delete
                                                    </a>--}}
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Status Update -->
                                    <div class="modal fade" id="statusModal{{$header->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">

                                                </div>
                                                <div class="modal-body m-auto">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure for Change Status?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    @if($header->status == 1)
                                                    <a href="{{url('admin/header/status')}}/{{$header->id}}" class="btn btn-danger">Active</a>
                                                    @else
                                                    <a href="{{url('admin/header/status')}}/{{$header->id}}" class="btn btn-danger">Deactive</a>
                                                    @endif
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Delete -->
                                    <div class="modal fade" id="deleteModal{{$header->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">

                                                </div>
                                                <div class="modal-body m-auto">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete ?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{url('admin/header/delete')}}/{{$header->id}}" class="btn btn-danger">Delete</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Show -->
                                    <div class="modal fade " id="showModal{{$header->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Header Information</h5>
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Header Title:</label>
                                                            <input type="text" name="header_title" class="form-control" value="{{$header->header_title}}" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Header Phone Number:</label>
                                                            <input type="text" name="mobile" class="form-control" value="{{$header->mobile}}" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Header Email:</label>
                                                            <input type="text" name="email" class="form-control" value="{{$header->email}}" />
                                                        </div>
														 <div class="form-group">
                                                            <label>Office Time:</label>
                                                            <input type="text" name="open" class="form-control" value="{{$header->open}}" />
                                                        </div>
														 <div class="form-group">
                                                            <label>Office Holiday:</label>
                                                            <input type="text" name="close" class="form-control" value="{{$header->close}}" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Header Logo</label>
                                                            <div class="custom-file">

                                                                <img src="{{asset('uploads/header')}}/{{$header->image}}" id="output_image" width="200px" style="padding-top: 5px;" />
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit -->
                                    <div class="modal fade " id="editModal{{$header->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to Edit ?</h5>
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('admin/update/header')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Header Title:</label>
                                                            <input type="text" name="header_title" class="form-control" value="{{$header->header_title}}" />
                                                            <input type="hidden" name="id" class="form-control" value="{{$header->id}}" />
                                                            <span class="form-text text-muted">Please enter your full Header Title</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Header Phone Number:</label>
                                                            <input type="text" name="mobile" class="form-control" value="{{$header->mobile}}" />
                                                            <span class="form-text text-muted">Please enter your Header Phone Number</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Header Email:</label>
                                                            <input type="text" name="email" class="form-control" value="{{$header->email}}" />
                                                            <span class="form-text text-muted">Please enter your Header Email</span>
                                                        </div>
														 <div class="form-group">
                                                            <label>Office Time:</label>
                                                            <input type="text" name="open" class="form-control" value="{{$header->open}}" />
                                                            <span class="form-text text-muted">Please enter your Header Email</span>
                                                        </div>
														 <div class="form-group">
                                                            <label>Office Holiday:</label>
                                                            <input type="text" name="close" class="form-control" value="{{$header->close}}" />
                                                            <span class="form-text text-muted">Please enter your Office Holiday</span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Header Logo</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="customFile" name="image" id="profile-img" onchange="preview_image(event)" />
                                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                                            </div>
                                                            <img src="{{asset('uploads/header')}}/{{$header->image}}" id="output_image" width="200px" style="padding-top: 5px;" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Favicon</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="favicon" name="favicon" id="profile-img" onchange="preview_image(event)" />
                                                                <label class="custom-file-label" for="favicon">Choose file</label>
                                                            </div>
                                                            <img src="{{asset('uploads/header')}}/{{$header->favicon}}" id="output_image" width="50px" style="padding-top: 5px;" />
                                                        </div>
                                                        <div class="form-group" style="display:;">
                                                            <label for="top_header_color" class="d-flex">Top Header Color: <p class="ml-5" style="background:{{$header->top_header_color}};height: 20px; width: 20px;border: 1px solid blue; border-radius: 3px;"></p></label>
                                                            <input type="text" id="top_header_color" name="top_header_color" class="form-control" value="{{$header->top_header_color}}" />
                                                            <span class="form-text text-muted">Please enter top_header_color</span>
                                                        </div>
                                                        <div class="form-group"  style="display:;">
                                                            <label for="navbar_color" class="d-flex">Navbar Background Color: <p class="ml-5" style="background:{{$header->navbar_color}};height: 20px; width: 20px;border: 1px solid blue; border-radius: 3px;"></p></label>
                                                            <input type="text" id="navbar_color" name="navbar_color" class="form-control" value="{{$header->navbar_color}}" />
                                                            <span class="form-text text-muted">Please enter navbar_color</span>
                                                        </div>
                                                        <div class="form-group" style="display:;">
                                                            <label for="navscroll_color" class="d-flex">Navbar-Scroll Color: <p class="ml-5" style="background:{{$header->navscroll_color}}; height: 20px; width: 20px; border: 1px solid blue; border-radius: 3px;"></p></label>
                                                            <input type="text" id="navbar_color" name="navscroll_color" class="form-control" value="{{$header->navscroll_color}}" />
                                                            <span class="form-text text-muted">Please enter navbar_scroll_color</span>
                                                        </div>
                                                        <div class="form-group" style="display:;">
                                                            <label for="btn_color" class="d-flex">Button Color: <p class="ml-5" style="background:{{$header->btn_color}};height: 20px; width: 20px;border: 1px solid blue; border-radius: 3px;"></p></label>
                                                            <input type="text" id="btn_color" name="btn_color" class="form-control" value="{{$header->btn_color}}" />
                                                            <span class="form-text text-muted">Please enter btn_color</span>
                                                        </div>
                                                        <div class="form-group" style="display:none;">
                                                            <label for="btn_hover_color" class="d-flex">Button Hover Color: <p class="ml-5" style="background:{{$header->btn_hover_color}};height: 20px; width: 20px;border: 1px solid blue; border-radius: 3px;"></p></label>
                                                            <input type="text" id="btn_hover_color" name="btn_hover_color" class="form-control" value="{{$header->btn_hover_color}}" />
                                                            <span class="form-text text-muted">Please enter btn_hover_color</span>
                                                        </div>
                                                        <div class="form-group" style="text-align: end;">
                                                            <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="{{asset('dashboard_assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script>

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
    $(function() {
        $("#usertable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>
<script type='text/javascript'>
    function preview_image(event) {
        var reader = new FileReader();
        reader.onload = function() {
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

            reader.onload = function(e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function() {
        readURL(this);
    });
</script>
@endsection