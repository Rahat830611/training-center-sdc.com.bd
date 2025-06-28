@extends('layouts.frontend')

@section('title')
Certificate Report
@endsection
@section('css')
<style>
    .text-bold{
        font-weight: bold;
    }
</style>
@endsection

@section('content')
<section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">Certificate Search</h2>
       </div>
    </section>
<!-- Brand Section Start -->
    <section id="page-section" class="my-md-5">
        <div class="container py-3">

            <div class="row">
                <div class="col-md-12">
                    <form class="SubmitForm" method="post">
                    @csrf
                    <div class="form-group row"><label class="col-lg-4 col-form-label text-bold">
                            Passport Number <span class="text-danger">*</span></label>
                        <div class="col-lg-6"><input type="text" value="" name="passportNumber" id="passportNumber"
                                required="required" class="form-control"></div>
                    </div>
                    <div class="form-group row"><label class="label col-md-6"></label>
                        <div class="col-lg-2 mt-4 align-right"><button type="submit" class="btn btn-primary">Search</button></div>
                    </div>
                  </form>
                </div>
            </div>
            <div class="row mt-5">
                <div id ="ajaxResults"></div>
                
            </div>
        </div>
    </section>
<!-- Brand Section End -->

@endsection
@section('js')
<script>
    $(document).ready(function(){
        $('.SubmitForm').on('submit',function(e){
            // alert('alert');
              e.preventDefault();   
              let search = $("input[name='passportNumber']").val();
              if(search == ''){
                  alert('Please enter your passport no');
                  return false;
              }
              $.ajax({
                url: "{{route('loadcerinfo')}}",
                type:"POST",
                data:{
                  "_token": "{{ csrf_token() }}",
                  search: search
                },
                dataType: 'json',
                success:function(response){
                    console.log(response);
                    if(response !== ''){
                        $('#ajaxResults').html(response.html);
                    }else{
                        alert("No Data Available");
                    }
                },
              });
          });
    })
</script>
@endsection