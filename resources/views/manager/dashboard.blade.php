@extends('layouts.projectmanager')

@section('content')
<div class="dashboard-header">
    <h1>Project Manager Dashboard</h1>
   
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Total Activities</h5>
        <p class="card-text">{{ $totalActivities }}</p>
    </div>
</div>


@endsection
