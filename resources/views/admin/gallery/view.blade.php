@extends('layouts.dashboard')
@section('title')
Gallery List
@endsection
@section('gallery')
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Gallery</h6>
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
                                <h3 class="card-label">All Gallery List</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a href="{{url('admin/gallery/create')}}" class="btn btn-success">Add New Gallery</a>
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
                                    @foreach($all_photo as $photo)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$photo->title}}</td>
                                        <td><img src="{{asset('uploads/gallery')}}/{{$photo->image}}" alt="" width="80px;"></td>
                                        <td>
                                            @if($photo->status == 1)
                                            <a href="#statusModal{{$photo->id}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-toggle-off icon-md"></i>Deactive
                                            </a>
                                            @else
                                            <a href="#statusModal{{$photo->id}}" data-toggle="modal" class="btn btn-success"><i class="fas fa-toggle-on icon-md"></i></i> Active
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-danger" href="#editModal{{$photo->id}}" data-toggle="modal"><i class="flaticon2-edit icon-lg"></i>&nbsp;&nbsp;Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#deleteModal{{$photo->id}}" data-toggle="modal"><i class="flaticon2-rubbish-bin-delete-button icon-lg"></i> &nbsp;&nbsp;Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Status Update -->
                                    <div class="modal fade" id="statusModal{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">

                                                </div>
                                                <div class="modal-body m-auto">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure for Change Status?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    @if($photo->status == 1)
                                                    <a href="{{url('admin/gallery/status')}}/{{$photo->id}}" class="btn btn-danger">Active</a>
                                                    @else
                                                    <a href="{{url('admin/gallery/status')}}/{{$photo->id}}" class="btn btn-danger">Deactive</a>
                                                    @endif
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Delete -->
                                    <div class="modal fade" id="deleteModal{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">

                                                </div>
                                                <div class="modal-body m-auto">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete ?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{url('admin/gallery/delete')}}/{{$photo->id}}" class="btn btn-danger">Delete</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- Edit -->
                                    <div class="modal fade " id="editModal{{$photo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to Edit ?</h5>
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('/admin/update/gallery',$photo->id)}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @if($photo->title)
                                                        <div class="form-group">
                                                            <label>Title:</label>
                                                            <input type="text" name="title" class="form-control" value="{{$photo->title}}">
                                                        </div>
                                                        @endif
                                                        <div class="form-group">
                                                            <label>Photo</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" id="photo" name="image" id="profile-photo" onchange="preview_photo(event)" />
                                                                <label class="custom-file-label" for="photo">Choose file</label>
                                                                <img src="{{asset('uploads/gallery')}}/{{$photo->image}}" id="output_photo" width="200px" style="padding-top: 5px;" />
                                                            </div>
                                                            @error('image')
                                                            <div class="alert alert-danger">
                                                                <span>{{$message}}</span>
                                                            </div>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group" style="text-align: end;">
                                                            <button type="submit" class="btn btn-primary">Update</button>
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