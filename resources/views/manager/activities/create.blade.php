@extends('layouts.projectmanager')

@section('content')
<div class="container">
    <h2>Assign Activity</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

        <form action="{{ route('manager.activities.store') }}" method="POST">
    @csrf


      <div class="mb-3">
    <label for="programid" class="form-label">Select Program</label>
    <select name="programid" class="form-control" required>
        <option value="">-- Select Program --</option>
        @foreach($programs as $program)
            <option value="{{ $program->programid }}">{{ $program->programid }} - {{ $program->title }}</option>
        @endforeach
    </select>
</div>


       

        <div class="mb-3">
            <label for="username" class="form-label">Select Trainer (Username)</label>
            <select name="username" class="form-control" required>
                <option value="">-- Select Trainer --</option>
                @foreach($trainers as $trainer)
                    <option value="{{ $trainer->username }}">{{ $trainer->username }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="activity_name" class="form-label">Activity Name</label>
           <input type="text" class="form-control" id="activity_name" name="activity_name" required>

        </div>

        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Activity Status</label>
            <select name="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Assign Activity</button>
    </form>
</div>
@endsection
