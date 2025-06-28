<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link rel="stylesheet" href="{{asset('assets/css/pdf.css')}}" />
    
</head>
<body>
    <div class="toolbar no-print">
        <!--<button class="btn btn-info" onclick="window.print()">-->
        <!--  Print Certificate-->
        <!--</button>-->
        <button class="btn btn-info" id="downloadPDF">Download PDF</button>
      </div>
    <div class="border-pattern" id="content2">
    
      <div class="content">
        <img
        src="{{asset('assets/img/bg.jpg')}}"
        class="cert-bg"
        alt=""
    />  <div class="cert-content">
        <div class="top-image">
            <img src="{{asset('assets/img/pdf_img/g.png')}}">
            <img src="{{asset('assets/img/pdf_img/cidb.png')}}">
            <img src="{{asset('assets/img/pdf_img/itees.png')}}"> 
            <img src="{{asset('assets/img/pdf_img/sdc_logo.png')}}">
        </div>
        <div class="main-container">
          <div class="top-header-content">
            <h3>SDC OVERSEAS TRAINING & TESTING CENTER</h3>
            <p>Registered Skill Training Provider Under</p>
            <p>Section 16(1) of NSDA Act, 2018</p>
          </div>
          <div class="reg-content">
            <div class="left-content">
                <p>Registration No: {{$data->register_no}}</p>
            </div>
            <div class="right-content">
                <p>Certificate No: {{$data->certificate_no}}</p>
            </div>
          </div>
          <div class="certificate-title-content">
           {{-- <h1>Certificate in {{$data->course->category_name ?? 'Welding and febrication' }}</h1>--}}
            @php
                $selectedCourseIds = !empty($data->trade_course) ? explode(",", $data->trade_course) : [];
            @endphp
            
            <h1>Certificate of 
                @if(empty($selectedCourseIds))
                    Welding and Fabrication
                @else
                    @foreach($selectedCourseIds as $courseId)
                        {{ App\Category::find($courseId)->category_name }}
                        @if(!$loop->last), @endif
                    @endforeach
                @endif
            </h1>

          </div>
          <div class="certificate-info-paragraph">
            
                 <p>This is to Certify that <span class="border-bottom">{{ucwords($data->name)}}</span> son/daughter of Mr <span class="border-bottom">{{ucwords($data->father_name)}}</span> And Mrs <span class="border-bottom">{{ucwords($data->mother_name)}}</span> Passsport no <span class="border-bottom">{{$data->passport_no}}</span>
                 achieved the following units of competencies through a training program held from {{ \Carbon\Carbon::parse($data->training_start_date)->format('d/m/Y') }} to @if($data->training_end_date) {{\Carbon\Carbon::parse($data->training_end_date)->format('d/m/Y')}} @else{{ \Carbon\Carbon::parse($data->training_start_date)->addMonths(6)->format('d/m/Y') }} @endif at SDC Overseas Training & Testing Center.</p>
          </div>
          <div class="certificate-notice">
            <h4>Units of competency</h4>
            <ul>
                <li>1.Apply Occupational health and safety (OHS) rules and precautions.</li>

                <li>2.Store and handle machines, tools and materials.</li>

                <li>3.Use measuring, marking, cutting and material identification.</li>

                <li>4.Interpret drawing, symbols and prepare material estimate & report writing. </li>

                <li>5.Perform <!-- Fax core Arc Welding (FCAW) in the position of--> @if(empty($data->position_name)).
                    Welding and Fabrication.
                @else
                   {{$data->position_name}}.
                @endif </li>
                <li>6.Perform Non Destructive Testing(NDT). </li>
            </ul>
          </div>
          <!--<div class="space-container"></div>-->
          <div class="certificate-bottom-content">
            <div class="info-one inspector">
                <p style="font-size: 11pt;">Welding Inspector</p>
                <p style="font-size: 11pt;">SDC Overseas Training & Testing Center</p>
            </div>
            <div class="info-one barcode">
                {!! QrCode::size(80)->generate(url('download-certificate')); !!}
                <p>www.sdc.com.bd</p>
            </div>
            <div class="info-one director">
                <p style="font-size: 11pt;">Director</p>
                <p style="font-size: 11pt;">SDC Overseas Training & Testing Center</p>
            </div>

          </div>
          <div id="watermarkImage"><img src="{{asset('assets/img/pdf_img/water_mark.png')}}"></div>
          </div>
        </div>
      </div>
  </div>
  @php  $name = $data->name; 
  $originalUrl = route('downloadcertiview');
  @endphp
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    
    let btn = document.getElementById('downloadPDF');
   let element = document.getElementById('content2');

         let opt = {
                 margin: [6, 0,0,5],
               image: {
                    type: "jpeg",
                    quality: 0.98
                },

                // pagebreak: { before: 'page-break', after: ['section'] },
            //   pagebreak: { mode: ['avoid-all', 'css', 'legacy'], after: ['#after1', '#after2'], avoid: ['seection', 'h4'] },
                // pagebreak: { mode: '', before: '.break-before', after: '.break-after', avoid: 'h3,h4,span,p,li, .experince-content, .userinfo, .skill-break, .page-brek' },
                html2canvas: {
                    dpi: 96, scale: 2, scrollX: 0, scrollY: 0
                },
                jsPDF: {
                    unit: "mm",
                    format: "a4",
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
                        pdf.text('Page ' + i + ' of ' + totalPages, pdf.internal.pageSize.getWidth() - 100, pdf.internal.pageSize.getHeight() - 5);
                      }
                    }).save('<?= $name ?>.pdf');
                    setTimeout(function() {
                        window.location.href = '<?= $originalUrl ?>'; // Redirect back to the original URL
                    }, 10000);
        //   let btn = document.getElementById("download");
            //  html2pdf(element, opt);
        }
         btn.addEventListener("click", () => {
        //   alert("Hi");
        // getPDF();
          getPDFFileButton();
      });

  </script>
</body>
</html>