@extends('layouts.projectmanager')

@section('content')
<div class="box">
    <h2>Activities</h2>

    <!-- Activity Form -->
    <form action="" method="POST">
        @csrf
        <div class="mb-3">
            <label for="program_id" class="form-label">Program ID</label>
            <input type="text" class="form-control" id="programid" name="programid" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="activity_name" class="form-label">Activity Name</label>
            <input type="text" class="form-control" id="activity_name" name="activity_name" required>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection
