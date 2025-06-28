@extends('layouts.frontend')

@section('title')
  {{ $aboutus->page_name }}
@endsection


@section('content')
    <section id="page-title-area">
        <div class=" title mb-5">
           <h2 class="page-title">{{ $aboutus->page_name }}</h2>
       </div>
    </section>
    
    <section id="page-section" class="my-md-5">
        <div class="container py-3">
            <div class="row">
                <div class="col-md-12">
                    {!!$aboutus->description!!}
                    @if (isset($aboutus->description_two))
                        {!!$aboutus->description_two!!}
                    @endif
                </div>
            </div>
            
             <div class="row">
                <div class="col-md-6">
                    <div class="download-profile">
                        <a type="button" class="btn btn-success" href="{{asset('uploads/aboutus/SDC-Profile.pdf') }}" target="_blank"><i class="fas fa-download"></i> Download SDC Company Profile</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="download-profile">
                        <a type="button" class="btn btn-success" href="{{asset('uploads/aboutus/RRC-Profile.pdf') }}" target="_blank"><i class="fas fa-download"></i> Download RRC Company Profile</a>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-img">
                        <img  src="{{asset('uploads/page')}}/{{$aboutus->image}}"/ class="profile-image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection