@extends('layouts.admin')

@section('content')
    <h2>Welcome to the Admin Dashboard</h2>

    <div class="dashboard-stats">
        <!-- Total Users Card -->
        <a href="{{ route('admin.users') }}" class="card-link">
            <div class="card">
                <div class="card-body">
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h3>Total Users</h3>
                    <p>{{ $totalUsers }}</p>
                </div>
            </div>
        </a>

        <!-- Total Modules Card -->
        <a href="{{ route('admin.modules') }}" class="card-link">
            <div class="card">
                <div class="card-body">
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3>Total Modules</h3>
                    <p>{{ $totalModules }}</p>
                </div>
            </div>
        </a>
    </div>
@endsection

@push('styles')
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
@endpush
