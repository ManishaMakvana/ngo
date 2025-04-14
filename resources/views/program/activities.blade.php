@extends('layouts.program')

@section('title', 'View Task')

@section('content')

<div class="container mt-4">
    <h3 class="text-center mb-4">View Task</h3> <!-- Added View Task Header -->

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>Program</th>
                    <th>Trainer (Username)</th>
                    <th>Activity</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($activities as $activity)
                    @if($activity->username == auth()->user()->username) 
                        <tr>
                            <td>{{ $activity->program->programid }} - {{ $activity->program->title }}</td>
                            <td>{{ $activity->username }}</td>
                            <td>{{ $activity->activity_name }}</td>
                            <td>{{ $activity->due_date }}</td>
                            <td>
                                <span class="badge bg-{{ $activity->status == 'completed' ? 'success' : 'warning' }}">
                                    {{ ucfirst($activity->status) }}
                                </span>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $activities->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection
