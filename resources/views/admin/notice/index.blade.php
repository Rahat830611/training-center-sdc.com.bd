@extends('layouts.dashboard')

@section('title')
All Notice
@endsection

@section('notice')
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Notice</h6>
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
                                <h3 class="card-label">All Notice List</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                        <!-- Add Logo-->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                            <i class="flaticon2-plus-1 icon-lg"></i> Add New Notice
                                        </button>

                                        <!-- Modal-->
                                        <div class="modal fade" id="exampleModalLong" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Create New Notice</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{url('admin/post/notice')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label> Notice Title:</label>
                                                                <input type="text" class="form-control" name="notice_title" />
                                                                <span class="form-text text-muted">Please enter your Notice Title</span>
                                                                @error('notice_title')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{$message}}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                            <label>Notice Type:</label>
                                                            <select id="notice" name="notice_type" class="form-control">
                                                                <option value="" selected disabled>Select</option>
                                                                <option value="1">নিয়োগ বিজ্ঞপ্তি</option>
                                                                <option value="2">অফিসিয়াল নোটিশ</option>
                                                            </select>
                                                            @error('notice_type')
                                                            <div class="alert alert-danger">
                                                                <strong>{{$message}}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        
                                                            <div class="form-group">
                                                                <label>Documents:</label>
                                                                <input type="file" name="pdf_document" accept="application/pdf">
                                                            </div>

                                                            <div class="form-group" style="text-align:end;">
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
                                        <th>SL NO.</th>
                                        <th> Notice Title</th>
                                        <th>Notice Type</th>
                                        <th>Documents</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($all_notice as $packeg)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$packeg->notice_title}}</td>
                                        <td>{{$packeg->notice_type==1?'নিয়োগ বিজ্ঞপ্তি':'অফিসিয়াল নোটিশ'}}</td>
                                        <td><a href="{{ asset('uploads/notice/'.$packeg->pdf_document) }}" target="_blank">View PDF</a></td>
                                        <td class="d-flex">
                                            <div class="dropdown">
                                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-warning" href="#editModal{{$packeg->id}}" data-toggle="modal"><i class="flaticon2-edit icon-lg"></i>&nbsp;&nbsp;Edit
                                                    </a>
                                                    <a class="dropdown-item text-danger" href="#deleteModal{{$packeg->id}}" data-toggle="modal"><i class="flaticon2-rubbish-bin-delete-button icon-lg"></i> &nbsp;&nbsp;Delete
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    <!-- Delete -->
                                    <div class="modal fade" id="deleteModal{{$packeg->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">

                                                </div>
                                                <div class="modal-body m-auto">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete ?</h5>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{url('admin/notice/delete')}}/{{$packeg->id}}" class="btn btn-danger">Delete</a>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit -->
                                    <div class="modal fade " id="editModal{{$packeg->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to Edit ?</h5>
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fas fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{url('admin/update/notice')}}/{{$packeg->id}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Notice Title:</label>
                                                            <input type="text" class="form-control" name="notice_title" value="{{ $packeg->notice_title}}" />
                                                            <span class="form-text text-muted">Please enter your Notice Title</span>
                                                            @error('notice_title')
                                                            <div class="alert alert-danger">
                                                                <strong>{{$message}}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Notice Type:</label>
                                                            <select id="notice" name="notice_type" class="form-control">
                                                                <option value="" selected disabled>Select</option>
                                                                <option value="1" {{$packeg->notice_type==1?'selected':''}}>নিয়োগ বিজ্ঞপ্তি</option>
                                                                <option value="2" {{$packeg->notice_type==2?'selected':''}}>অফিসিয়াল নোটিশ</option>
                                                            </select>
                                                            @error('notice_type')
                                                            <div class="alert alert-danger">
                                                                <strong>{{$message}}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label>Documents:</label>

                                                            <input type="file" name="pdf_document" accept="application/pdf">
                                                            @if($packeg->pdf_document)
                                                            <a href="{{ asset('uploads/notice/'.$packeg->pdf_document) }}">{{ $packeg->pdf_document }}</a>
                                                            @endif

                                                        </div>

                                                        <div class="form-group" style="text-align:end;">
                                                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary font-weight-bold">Submit</button>
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
@if ($errors->any())
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    };

    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}', 'Error');
    @endforeach
</script>
@endif
<script>
    $(function() {
        $("#usertable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.open-package-modal').click(function() {
            var packageId = $(this).data('id');
            $('input[name=package_id]').val(packageId);
        });

    })
</script>
@endsection