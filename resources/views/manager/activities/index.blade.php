@extends('layouts.projectmanager')

@section('content')
<div class="container">
    <h2>Assigned Activities</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Program</th>
                <th>Trainer (Username)</th>
                <th>Activity</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th> <!-- New Column for Edit/Delete -->
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->program->programid ?? '-' }} - {{ $activity->program->title ?? 'No Title' }}</td>

                    <td>{{ $activity->username }}</td>
                    <td>{{ $activity->activity_name }}</td>
                    <td>{{ $activity->due_date }}</td>
                    <td>{{ ucfirst($activity->status) }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <!-- Delete Button with Confirmation -->
                        <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $activities->links() }}
    </div>
</div>

<!-- JavaScript for Delete Confirmation -->
<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this activity?");
    }
</script>
@endsection
