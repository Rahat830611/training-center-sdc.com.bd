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
        <button class="btn btn-info" onclick="window.print()">
          Print Certificate
        </button>
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
            <img src="{{asset('assets/img/pdf_img/sdc_logo.jpg')}}">
        </div>
        <div class="main-container">
          <div class="top-header-content">
            <h3>SDC OVERSEAS TRAINING & TESTING CENTER</h3>
            <p>Registered Skill Training Provider Under</p>
            <p>Section 16(1) of NSDA Act, 2018</p>
          </div>
          <div class="reg-content">
            <div class="left-content">
                <p>Registration No: {{$tradedata->register_no}}</p>
            </div>
            <div class="right-content">
                <p>Certificate No: {{$tradedata->certificate_no}}</p>
            </div>
          </div>
          <div class="certificate-title-content">
            <h1>Certificate in {{$tradedata->course->category_name ?? 'Welding and febrication' }}</h1>
          </div>
          <div class="certificate-info-paragraph">
            <p>This is Certificate That <span class="border-bottom">{{$tradedata->name}}</span> son/daughter of Mr <span class="border-bottom">{{$tradedata->father_name}}</span> And Mrs <span class="border-bottom">{{$tradedata->mother_name}}</span> Passsport no <span class="border-bottom">{{$tradedata->passport_no}}</span>
                for having achieved the following units of competencies through a training program held from {{ \Carbon\Carbon::parse($tradedata->created_at)->format('d/m/Y') }} to {{ \Carbon\Carbon::parse($tradedata->created_at)->addMonths(6)->format('d/m/Y') }} at SDC Overseas Training & Testing Center.</p>
          </div>
          <div class="certificate-notice">
            <h4>Units of competency</h4>
            <ul>
                <li>1.Apply Occupational health and safety (OHS) rues and precautions.</li>

                <li>2.Store and handle machines, tols and materials.</li>

                <li>3.Use measuring, marking, cutting and material identification</li>

                <li>4.Interpret drawing, symbols and prepare material estimate & report writing </li>

                <li>5.Perform Fax core Arc Welding (FCAW) in the position of 1F,2F,3F,4F, and 1G,2G,3G,4G, </li>
                <li>6.Perform Non Destructive Testing(NDT) </li>
            </ul>
          </div>
          <div class="certificate-bottom-content">
            <div class="info-one inspector">
                <p style="font-size: 10pt;">Welding Inspector</p>
                <p style="font-size: 11pt;">SDC Overseas Training & Testing Center</p>
            </div>
            <div class="info-one barcode">
                {!! QrCode::size(80)->generate(url('download-certificate')); !!}
            </div>
            <div class="info-one director">
                <p style="font-size: 10pt;">Director</p>
                <p style="font-size: 11pt;">SDC Overseas Training & Testing Center</p>
            </div>

          </div>
          <div id="watermarkImage"><img src="{{asset('assets/img/pdf_img/water_mark.png')}}"></div>
          </div>
        </div>
      </div>
  </div>
  @php  $name = $tradedata->name; @endphp
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    
    let btn = document.getElementById('downloadPDF');
   let element = document.getElementById('content2');

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