@extends('layouts.dashboard')
@section('title')
Add/Edit Trade
@endsection
@section('trade')
 menu-item-active
@endsection

@section('css')
<style>
    .tableb tr td:first-child{
        width:40%;
    }
</style>
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
                <h6 class="text-dark font-weight-bold mt-2 mb-2 mr-5"></h6>
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
						   		<h3 class="card-label">Details Info</h3>
						    </div>

						    <div class="card-toolbar">
							   	<ul class="nav nav-bold nav-pills ml-auto">
								    <li class="nav-item">
								    	<a href="{{route('tradesinfo.index')}}" class="btn btn-success">View</a>
								    </li>
							   </ul>
							</div>
						</div>
						<div class="card-body">
						  	<div class="row">
						  		<div class="col-lg-10 m-auto">
						  		    <button class="btn btn-success mb-5" id="resume_btn">
                                        Download Profile
                                    </button>
                                    <a class="btn btn-success mb-5" href="{{route('downloadfile', $data->id)}}" target="_blank">
                                        Download Certificate
                                    </a>
                                    <div style="margin: 25px 0"></div>
                                    
                                    <div id="downloadcv">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{asset('assets/img/pdf_img/sdc_logo.png')}}" style="max-width:100%;">
                                            </div>
                                            <div class="col-md-10">
                                               <div class="top-header-content text-center">
                                                <h3>SDC OVERSEAS TRAINING & TESTING CENTER</h3>
                                                <p>Registered Skill Training Provider Under</p>
                                                <p>Section 16(1) of NSDA Act, 2018</p>
                                              </div> 
                                            </div>
                                        </div>
                                        
                                        <h2 class="text-center" style="margin-bottom:10px">Candidate Full Information</h2>
						  		    <table class="table table-bordered tableb">
						  		        <tbody>
						  		            <tr>
						  		                <td>Trade Course</td>
						  		                <td>{{$data->course->category_name ?? 'Welding & Febrication'}}</td>
						  		            </tr>
						  		            <tr>
                                                <td>Name</td>
                                                <td>{{$data->name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Father's Name</td>
                                                <td>{{$data->father_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Contact Number</td>
                                                <td>{{$data->phone }}</td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>{{$data->gender}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nationality</td>
                                                <td>{{$data->nationality}}</td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth</td>
                                                <td>{{$data->dob }}</td>
                                            </tr>
                                            <tr>
                                                <td>Birth Registration No. / National ID </td>
                                                <td>{{$data->bn_registration_no }}</td>
                                            </tr>
                                            <tr>
                                                <td>Passport No.</td>
                                                <td>{{$data->passport_no}}</td>
                                            </tr>
                                            <tr>
                                                <td>Document Country Issue</td>
                                                <td>{{$data->document_issues }}</td>
                                            </tr>
                                            <tr>
                                                <td>Passport Issue Date</td>
                                                <td>{{$data->passport_issue_date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Passport Expiry Date</td>
                                                <td>{{$data->passport_expirary_date}}</td>
                                            </tr>
                                            <tr>
                                                <td>Worker type</td>
                                                <td>Foreign Worker</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{$data->address}}</td>
                                            </tr>
                                            @if($data->zip_code)
                                            <tr>
                                                <td>Zip code</td>
                                                <td>{{$data->zip_code}}</td>
                                            </tr>
                                            @endif
						  		        </tbody>
						  		    </table>
						  		     @if($data->file_type == 'image')
						  		    <div class="pdf-container">
						  		        
						  		        
						  		       
						  		        <h4>Certificate</h4>
						  		        <img src="{{asset('uploads/candidate/'.$data->file_name)}}" height="200px">
						  		        
						  		    </div>
						  		    @endif
						  		    </div>
						  		    
						  		</div>
						  	</div>
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
@php $name = $data->name; @endphp
@endsection
@section('js')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    let btn = document.getElementById('resume_btn');
   let element = document.getElementById('downloadcv');

         let opt = {
                margin: [50, 10,50,10],
               image: {
                    type: "jpeg",
                    quality: 0.98
                },

                // pagebreak: { before: 'page-break', after: ['section'] },
            //   pagebreak: { mode: ['avoid-all', 'css', 'legacy'], after: ['#after1', '#after2'], avoid: ['seection', 'h4'] },
                pagebreak: { mode: '', before: '.break-before', after: '.break-after', avoid: 'h3,h4,span,p,li, .experince-content, .userinfo, .skill-break, .page-brek' },
                html2canvas: {
                    dpi: 96, scale: 2, scrollX: 0, scrollY: 0
                },
                jsPDF: {
                    unit: "pt",
                    format: "letter",
                    orientation: "portrait",
                }
            };
        function getPDFFileButton(){

        html2pdf().set(opt).from(element).toPdf().
            get('pdf').then(function (pdf) {
                      var totalPages = pdf.internal.getNumberOfPages();

                      for (let i = 1; i <= totalPages; i++) {
                        pdf.setPage(i);
                        pdf.setFontSize(10);
                        pdf.setTextColor(150);
                        pdf.text('Page ' + i + ' of ' + totalPages, pdf.internal.pageSize.getWidth() - 100, pdf.internal.pageSize.getHeight() - 20);
                      }
                    }).save('<?= $name ?>.pdf');
        }
         btn.addEventListener("click", () => {
        
          getPDFFileButton();
      });    
</script>

@endsection
