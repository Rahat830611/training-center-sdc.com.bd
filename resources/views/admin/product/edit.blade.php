@extends('layouts.dashboard')

@section('title')
Product
@endsection

@section('product')
menu-item-active
@endsection

@section('css')
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5"> Update Product</h6>
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
                <div class="col-lg-10">
                    <div class="card card-custom">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="card-label">Update Product</h3>
                            </div>
                            <div class="card-title">
                                <a type="button" class="btn btn-primary" href="{{url('/admin/product/create')}}">View</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/update/product')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Category Name:</label><br>
                                        <select id="category_id" name=category_id class="form-control">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($all_category as $category)
                                            <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected':''}}>{{$category->category_name}} </option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Please select an option.</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="title">Sub-Category Name:</label>
                                        <select name=subcategory_id id="subcategory_id" class="form-control">
                                            <option value="{{$product->subcategory_id}}">{{$product->connect_subcategory->title??''}}</option>
                                        </select>
                                        {{-- <select style="width: 100%;" name="subcategory_id" id="subcategory" class="form-control">
									                	<option value="">Select</option>
													    @foreach($all_subcategory as $subcategory)
													    <option value="{{$subcategory->id}}" {{$product->subcategory_id == $subcategory->id ? 'selected':''}}>{{$subcategory->title}}</option>
                                        @endforeach
                                        </select> --}}
                                    </div>
                                    <div class="col-lg-4" style="display: none;">
                                        <label for="title">Child-Category Name:</label>
                                        <select name=childcategory_id id="childcategory_id" class="form-control">
                                            <option value="{{$product->childcategory_id}}">{{$product->connect_childcategory->title??''}}</option>
                                        </select>
                                        {{-- <select style="width: 100%;" name="childcategory_id" id="childcategory" class="form-control">
									                	<option value="">Select</option>
													    @foreach($all_childcategory as $childcategory)
													    <option value="{{$childcategory->id}}" {{$product->childcategory_id == $childcategory->id ? 'selected':''}}>{{$childcategory->title}}</option>
                                        @endforeach
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" class="form-control form-control-solid" value="{{$product->product_name}}" />
                                        <input type="hidden" name="id" class="form-control form-control-solid" value="{{$product->id}}" />
                                        <span class="form-text text-muted">Please enter your Product Name</span>
                                    </div>
                                </div>
                                {{--<div class="form-group row">
                                    <div class="col-lg-7 col-md-7 col-sm-12">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" class="form-control form-control-solid" value="{{$product->product_name}}" />
                                        <input type="hidden" name="id" class="form-control form-control-solid" value="{{$product->id}}" />
                                        <span class="form-text text-muted">Please enter your Product Name</span>
                                    </div>
                                    <!--<div class="col-lg-4">-->
                                    <!--  <label>Price:</label>-->
                                    <!-- <input type="text" class="form-control form-control-solid" name="price" value="{{$product->price}}"/>-->
                                    <!-- <span class="form-text text-muted">Please enter your Price</span>-->
                                    <!--</div>-->
                                    <div class="col-lg-5 col-md-5 col-sm-12" style="">
                                        <label for="title">Product Code:</label>
                                        <input type="text" name="product_code" class="form-control form-control-solid" value="{{$product->product_code}}" />
                                        <span class="form-text text-muted">Please enter your Product Code</span>
                                    </div>
                                </div>--}}

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="summernotetwo" name="description">{!! $product->description??'' !!}</textarea>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label>Product Photo Browser</label>
                                        <div></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image" id="profile-photo" onchange="preview_photo(event)" />
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                            <img src="{{asset('uploads/product')}}/{{$product->image}}" id="output_photo" width="200px" style="padding-top: 5px;" />
                                        </div>
                                    </div>

                                    @error('image')
                                    <div class="alert alert-danger">
                                        <strong>{{$mesage}}</strong>
                                    </div>
                                    @enderror

                                   {{-- @php
                                    @$datas = json_decode(App\ProductImage::where('product_id',$product->id)->first()->images);
                                    @endphp

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label>Other Photo Browser</label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" name="images[]" multiple>
                                        </div>
                                        @if($datas)
                                        @foreach($datas as $image)
                                        <img class="edit-img" src="{{asset('uploads/product')}}/{{$image}}" id="output_photo" width="60px" />
                                        @endforeach
                                        @endif
                                    </div>--}}

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
        </div>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
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
<script type='text/javascript'>
    function preview_photo(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output_photo');
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
<script type=text/javascript>
    $('#country').change(function() {
        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: "GET",
                url: '../get-state-list/' + countryID,
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(res) {
                    if (res) {
                        $("#state").empty();
                        $("#state").append('<option value="">Select</option>');
                        $.each(res, function(key, value) {
                            $("#state").append('<option value="' + value.id + '">' + value.title + '</option>');
                        });

                    } else {
                        $("#state").empty();
                    }
                }
            });
        } else {
            $("#state").empty();
            $("#city").empty();
        }
    });
    $('#state').on('change', function() {
        var stateID = $(this).val();
        console.log(stateID);
        if (stateID) {
            $.ajax({
                type: "GET",
                url: '/get-city-list/' + stateID,
                success: function(res) {
                    if (res) {
                        $("#city").empty();
                        $.each(res, function(key, value) {
                            $("#city").append('<option value="' + value.id + '">' + value.title + '</option>');
                        });

                    } else {
                        $("#city").empty();
                    }
                }
            });
        } else {
            $("#city").empty();
        }

    });
</script>
<script type=text/javascript>
    $('#category_id').change(function() {
        var countryID = $(this).val();
        if (countryID) {
            $.ajax({
                type: "GET",
                url: "{{url('admin/get-state-list')}}" + '/' + countryID,
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                dataType: "json",
                success: function(res) {
                    if (res) {
                        $("#subcategory_id").empty();
                        $("#subcategory_id").append('<option>Select</option>');
                        $.each(res, function(key, value) {
                            $("#subcategory_id").append('<option value="' + value.id + '">' + value.title + '</option>');
                        });

                    } else {
                        $("#subcategory_id").empty();
                    }
                }
            });
        } else {
            $("#subcategory_id").empty();
            $("#childcategory_id").empty();
        }
    });
    $('#subcategory_id').on('change', function() {
        var stateID = $(this).val();
        console.log(stateID);
        if (stateID) {
            $.ajax({
                type: "GET",
                url: '/get-city-list/' + stateID,
                success: function(res) {
                    if (res) {
                        $("#childcategory_id").empty();
                        $.each(res, function(key, value) {
                            $("#childcategory_id").append('<option value="' + value.id + '">' + value.title + '</option>');
                        });

                    } else {
                        $("#childcategory_id").empty();
                    }
                }
            });
        } else {
            $("#childcategory_id").empty();
        }

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#category").select2({
            placeholder: "search here",
            allowClear: true,
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#subcategory").select2({
            placeholder: "search here",
            allowClear: true,
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#childcategory").select2({
            placeholder: "search here",
            allowClear: true,
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 250,
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernotetwo').summernote({
            height: 250,
        });
    });
</script>
@endsection