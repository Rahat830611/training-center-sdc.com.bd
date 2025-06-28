<div class="col-md-12 table-responsive">
    <table class="table table-striped table-bordered custom-table">
        <thead>
            <tr class="text-center">
                <th>Name</th>
                <th>Phone</th>
                <th>Passport Number</th>
                <th>Documents</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $reports)
            <tr class="text-center">
                <td>{{ $reports->name}}</td>
                <td>{{ $reports->phone}}</td>
                <td>{{ $reports->passport}}</td>
                <td style="overflow-wrap: break-word;">
                    <ul class="ul list-group">
                        <li class="list-group-item d-flex">
                            <a href="{{ asset('uploads/reports/'.$reports->pdf_document) }}" data-name = '{{ $reports->pdf_document }}' class="d-none" id="downloadLink">{{ $reports->pdf_document }}</a>
                            <button class="btn btn-primary" onclick="downloadPDF()">Download PDF</button>
                        </li>
                    </ul>
                </td>
            </tr>
            @empty
            <tr class="text-center">
                <td colspan="4">No Data found</td>
            </tr>
             @endforelse
        </tbody>
    </table>
</div>