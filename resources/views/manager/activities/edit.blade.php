@extends('layouts.projectmanager')

@section('content')
<div class="container">
    <h2>Edit Activity</h2>

    <form action="{{ route('activities.update', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Activity Name</label>
            <input type="text" name="activity_name" class="form-control" value="{{ $activity->activity_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ $activity->due_date }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $activity->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="In_progress" {{ $activity->status == 'pending' ? 'selected' : '' }}>In_progress</option>
                <option value="completed" {{ $activity->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Activity</button>
        <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
