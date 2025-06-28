@extends('layouts.dashboard')
@section('title')
Report Section
@endsection
@section('reports')
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Reports</h6>
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
                                <h3 class="card-label">All Reports List</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                        <!-- Add Logo-->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                           <i class="flaticon2-plus-1 icon-lg"></i> Add New Reports
                                        </button>

                                        <!-- Modal-->
                                        <div class="modal fade" id="exampleModalLong" data-backdrop="static"
                                            tabindex="-1" role="dialog" aria-labelledby="staticBackdrop"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Create New
                                                            Reports</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('medicalreports.store')}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group" style="display:none;">
                                                                <label> Name:</label>
                                                                <input type="text"
                                                                    class="form-control"
                                                                    name="name" />
                                                                <span class="form-text text-muted">Please enter your
                                                                    Name</span>
                                                                @error('name')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{$message}}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group"  style="display:none;">
                                                                <label>Phone No:</label>
                                                                <input type="text"
                                                                    class="form-control"
                                                                    name="phone" />
                                                                <span class="form-text text-muted">Please enter your
                                                                   Phone No</span>
                                                                @error('phone')
                                                                <div class="alert alert-danger">
                                                                    <strong>{{$message}}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                            <label>Passport No:</label>
                                                            <input type="text" class="form-control"
                                                                name="passport" />
                                                            <span class="form-text text-muted">Please enter your
                                                                passport</span>
                                                            @error('passport')
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
                                                                <button type="button"
                                                                    class="btn btn-light-primary font-weight-bold"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary font-weight-bold">Submit</button>
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
                                       {{-- <th> Name</th>
                                        <th>Phone</th>--}}
                                        <th>Passport Number</th>
                                        <th>Documents</th>
                                        <!--<th></th>-->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($data as $packeg)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        {{--<td>{{$packeg->name}}</td>
                                        <td>{{ $packeg->phone}}</td>--}}
                                        <td>{{ $packeg->passport}}</td>
                                        <td><a href="{{ asset('uploads/reports/'.$packeg->pdf_document) }}" target="_blank">View PDF</a></td>
                                        <td class="d-flex"> 
                                            <div class="dropdown">
                                                <button class="btn btn-dark dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-warning"
                                                        href="#editModal{{$packeg->id}}" data-toggle="modal"><i
                                                            class="flaticon2-edit icon-lg"></i>&nbsp;&nbsp;Edit
                                                    </a>
                                                    <form action="{{route('medicalreports.destroy',$packeg->id)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            onclick="return confirm('Are You Sure You Want to Delete?')"
                                                            class="dropdown-item text-danger"><i
                                                                class="flaticon2-rubbish-bin-delete-button icon-lg"></i>
                                                            &nbsp;&nbsp;Delete</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit -->
                                    <div class="modal fade " id="editModal{{$packeg->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header state modal-primary">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you
                                                        want to Edit ?</h5>
                                                    <button type="button" class="btn btn-warning"
                                                        data-dismiss="modal"><i class="fas fa-times"></i></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('medicalreports.update', $packeg->id)}}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group" style="display:none;">
                                                            <label>Name:</label>
                                                            <input type="text" class="form-control"
                                                                name="user_name" value="{{ $packeg->name}}" />
                                                            <span class="form-text text-muted">Please enter your
                                                                 Name</span>
                                                            @error('user_name')
                                                            <div class="alert alert-danger">
                                                                <strong>{{$message}}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group" style="display:none;">
                                                            <label>Phone No:</label>
                                                            <input type="text" class="form-control"
                                                                name="user_phone" value="{{ $packeg->phone}}" />
                                                            <span class="form-text text-muted">Please enter your
                                                                phone</span>
                                                            @error('user_phone')
                                                            <div class="alert alert-danger">
                                                                <strong>{{$message}}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Passport No:</label>
                                                            <input type="text" class="form-control"
                                                                name="user_passport" value="{{ $packeg->passport}}" />
                                                            <span class="form-text text-muted">Please enter your
                                                                passport</span>
                                                            @error('user_passport')
                                                            <div class="alert alert-danger">
                                                                <strong>{{$message}}</strong>
                                                            </div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Documents:</label>
                                                            
                                                            <input type="file" name="user_pdf_document" accept="application/pdf">
                                                            @if($packeg->pdf_document)
                                                            <a href="{{ asset('uploads/reports/'.$packeg->pdf_document) }}">{{ $packeg->pdf_document }}</a>
                                                            @endif
                                                            
                                                        </div>

                                                        <div class="form-group" style="text-align:end;">
                                                            <button type="button"
                                                                class="btn btn-light-primary font-weight-bold"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-primary font-weight-bold">Submit</button>
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

        @foreach ($errors->all() as $error)
            toastr.error('{{ $error }}', 'Error');
        @endforeach
    </script>
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
    $(document).ready(function(){
        $('.open-package-modal').click(function() {
            var packageId = $(this).data('id');
            $('input[name=package_id]').val(packageId);
        });
        
    })

</script>
@endsection
