@extends('layouts.projectmanager')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center"> Reports</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Title</th>
                    <th>Program ID</th>
                    <th>Username</th>
                    <th>School</th>
                    <th>Activity</th>
                    <th>Girls</th>
                    <th>Boys</th>
                    <th>Teacher</th>
                    <th>Due Date</th>
                    <th>Description</th>
                    <th>Google Photos</th>
                    <th>Hero Pic</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->programid }}</td>
                    <td>{{ $report->username }}</td>
                    <td>{{ $report->school }}</td>
                    <td>{{ $report->activity_name }}</td>
                    <td>{{ $report->girls }}</td>
                    <td>{{ $report->boys }}</td>
                    <td>{{ $report->teacher }}</td>
                    <td>{{ $report->due_date }}</td>
                    <td>{{ $report->basic_description }}</td>
                    <td><a href="{{ $report->google_photos }}" target="_blank" class="btn btn-primary btn-sm">View</a></td>
                    <td>
                        @if($report->hero_pic)
                            <img src="{{ asset('storage/' . $report->hero_pic) }}" class="img-thumbnail" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <div id="status-container-{{ $report->id }}">
                            @if($report->status)
                                <span class="badge bg-{{ $report->status == 'approved' ? 'success' : 'danger' }}">{{ ucfirst($report->status) }}</span>
                                <button class="btn btn-warning btn-sm" onclick="toggleEdit({{ $report->id }})">Change</button>
                            @else
                                <form id="form-{{ $report->id }}" action="{{ route('reports.updateStatus', $report->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm mb-2">
                                        <option value="" disabled>Select</option>
                                        <option value="approved">Approve</option>
                                        <option value="rejected">Reject</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
   function toggleEdit(reportId) {
    let url = "{{ route('reports.updateStatus', ':id') }}".replace(':id', reportId);
    let container = document.getElementById(`status-container-${reportId}`);
    container.innerHTML = `
        <form id="form-${reportId}" action="${url}" method="POST">
            @csrf
            @method('PUT')
            <select name="status" class="form-select form-select-sm mb-2">
                <option value="" disabled>Select</option>
                <option value="approved">Approve</option>
                <option value="rejected">Reject</option>
            </select>
            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
    `;
}

</script>
@endsection
