@extends('layouts.frontend')

@section('title')
Notice
@endsection

@section('content')
<section id="page-title-area">
    <div class=" title mb-3">
        <h2 class="page-title">Hot Jobs</h2>
    </div>
</section>

<section id="page-section" class="notice">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="post-content notice-page mb-5">
                    <div class="notice-area">
                         @foreach($all_notice as $packeg)
                        <div class="notice-item">
                            <a href="{{asset('uploads/notice')}}/{{ $packeg->pdf_document }}" target="_blank" title="click for details">
                                <div class="notice-caption">
                                    <p>{{ $packeg->notice_type==1? 'নিয়োগ বিজ্ঞপ্তিঃ ' : 'অফিসিয়াল নোটিশঃ ' }} <span class="document"> {{ $packeg->notice_title }}</span>  </p> 
                                    <span class="date"> {{ $packeg->created_at->format('j F, Y') }} |</span><span class="download"> Download file - <i class="fas fa-file-pdf"></i> {{ $packeg->pdf_document }} </span>
                                </div> 
                            </a>
                        </div> 
                        @endforeach
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>

@endsection