@extends('layouts.dashboard')
@section('title')
Trade Section
@endsection
@section('trade')
menu-item-active
@endsection
@section('css')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<link rel="stylesheet" href="{{asset('dashboard_assets/plugins/custom/datepicker/bootstrap-datepicker.css')}}" />

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
                                <h3 class="card-label">All Candidate Info List</h3>
                            </div>

                            <div class="card-toolbar">
                                <ul class="nav nav-bold nav-pills ml-auto">
                                    <li class="nav-item">
                                        <!-- Add Logo-->
                                        <a class="btn btn-primary" href="{{route('tradesinfo.create')}}">
                                            <i class="flaticon2-plus-1 icon-lg"></i> Add New Candidate
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row bg-body-light py-4 mb-2 input-daterange">
                                <div class="col-sm-4">
                                   <p style="font-size: 18px;color:#444;"><b>Candidate Report</b> @if(@$date)<span class="badge badge-circle badge-success">{{@$date}}</span> @endif </p>
                                </div>
                              <div class="col-sm-2">
                                 <div class="dropdown">
                                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select Date
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu" style="box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);">
                                  <li><a class="select-date" href="{{route('tradesinfoByDate', 'today')}}">Today</a></li>
                                  <li><a class="select-date" href="{{route('tradesinfoByDate', 'yesterday')}}">Yesterday</a></li>
                                  <li><a class="select-date" href="{{route('tradesinfoByDate', 7)}}">Last 7 Days</a></li>
                                  <li><a class="select-date" href="{{route('tradesinfoByDate', 30)}}">Last 30 Days</a></li>
                                  <li><a class="select-date" href="{{route('tradesinfoByDate', 'this_month')}}">This Month</a></li>
                                  <li><a class="select-date" href="{{route('tradesinfoByDate', 'last_month')}}">Last Month</a></li>
                                </ul>
                              </div>
                              </div>
                              <div class="col-sm-6">
                                 <form class="form-inline select-date-interval" method="get" action="{{route('tradesinfoByDateInterval')}}">
                                <div class="form-group form-group-sm">
                                  <label for="date_from">From:</label>
                                  <input type="text" name="from_date" id="from_date" class="form-control"
                                                        placeholder="From Date" readonly />
                                </div>
                                <div class="form-group form-group-sm">
                                  <label for="date_to">To:</label>
                                  <input type="text" name="to_date" id="to_date" class="form-control"
                                                        placeholder="To Date" readonly />
                                </div>
                                 
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <a class="btn btn-info btn-sm" href="{{route('tradesinfo.index')}}">Refresh</a>
                              </form>
                              </div>
                            </div> 
                            
                            <!--begin: Search Form-->
                            <!--begin: Datatable-->
                            <div class="table-responsive">
                                <form action="{{route('downloadinfo')}}" method="POST">
    						        @csrf
    						        <table class='table table-bordered'>
										<tr>
											<td colspan="">
												<select name="table_typ" class="form-control" required="">
													<option disabled="" value="" selected="">Please Select</option>
													<option value="1">Download Info</option>
												</select>
											</td>
											<td colspan="10">
												<button type="submit" class="btn btn-success">Submit</button>
											</td>
										</tr>
    										
    								</table>
                                    <table id="usertable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL NO.</th>
                                        <th class="not-export-col"><input type='checkbox' class='checkAll'></th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Worker Type</th>
                                        <th>Gender</th>
                                        <th>Passport Number</th>
                                        <th>Passport Date limit</th>
                                        <th>Phone no</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th class="not-export-col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach($data as $packeg)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td><input class="checkbox" value="{{$packeg->id}}" type="checkbox" name="package_id[]"></td>
                                        
                                        <td>{{$packeg->name}}</td>
                                        <td>{{ $packeg->course->category_name ?? ' '}}</td>
                                        <td>{{ $packeg->worker_type}}</td>
                                        <td>{{ucwords($packeg->gender) }}</td>
                                        <td>{{ $packeg->passport_no}}</td>
                                        <td> {{$packeg->passport_issue_date .' to '. $packeg->passport_expirary_date}}
                                        </td>

                                        <td>{{$packeg->phone}}</td>
                                        <td>
                                            @if($packeg->training_status == 0)      Pending
                                            @else
                                            Completed
                                            @endif
                                        </td>
                                        <td>{{$packeg->training_start_date}}</td>
                                        <td class="d-flex">
                                            <div class="dropdown">
                                                <button class="btn btn-dark dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item text-white btn btn-primary mb-2"
                                                        href="{{route('tradesinfo.edit', $packeg->id)}}">Edit
                                                    </a>
                                                    <a class="dropdown-item text-white btn btn-info"
                                                        href="{{route('tradesinfo.show', $packeg->id)}}">
                                                        View Profile
                                                    </a>
                                                    {{--<form action="{{route('tradesinfo.destroy',$packeg->id)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit"
                                                            onclick="return confirm('Are You Sure You Want to Delete?')"
                                                            class="dropdown-item text-danger"><i
                                                                class="flaticon2-rubbish-bin-delete-button icon-lg"></i>
                                                            &nbsp;&nbsp;Delete</button>
                                                    </form>--}}

                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Edit -->

                                    @endforeach
                                </tbody>
                            </table>
                                </form>
                            </div>
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
<!--<script src="{{asset('dashboard_assets/js/pages/crud/file-upload/dropzonejs.js')}}"></script>-->
<script src="{{asset('dashboard_assets/plugins/custom/datepicker/bootstrap-datepicker.js')}}"></script>

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
    $(function () {
        $("#usertable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('.open-package-modal').click(function () {
            var packageId = $(this).data('id');
            $('input[name=package_id]').val(packageId);
        });
        $(".checkAll").on('change',function(){
          $(".checkbox").prop('checked',$(this).is(":checked"));
        });
        $(".input-daterange").datepicker({
            todayBtn: "linked",
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true,
            daysOfWeekDisabled: "5",
        });
    })
</script>
@endsection