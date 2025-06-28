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
                <td>{{ $reports->passport_no}}</td>
                <td style="overflow-wrap: break-word;">
                    <ul class="ul list-group">
                        <li class="list-group-item">
                            @if($reports->training_status == 1)
                            <a href="{{ route('downloadcerti',$reports->id) }}" target="_blank">Download Certificate</a>
                            @else
                                Not Ready
                            @endif
                            {{--@if($reports->file_name)
                            <a href="{{ asset('uploads/candidate/'.$reports->file_name) }}" target="_blank">{{ $reports->file_name }}</a>
                            @else
                            No Documents found
                            @endif --}}
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