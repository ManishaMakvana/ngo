@extends('layouts.admin')

@section('content')
    <h2 class="text-center">Add New User</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('admin.storeUser') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="programid">Program ID</label>
                    <input type="text" name="programid" id="programid" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add User</button>
            </form>
        </div>
    </div>

    @push('styles')
    <style>
        
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            border-radius: 0.25rem;
            padding: 0.5rem;
        }
        .btn-primary {
        background-color: #007bff;
        border: 1px solid #007bff;
        padding: 0.75rem 1.5rem; /* Increase padding for a larger button */
        font-size: 1.1rem; /* Slightly larger font */
        border-radius: 0.375rem; /* Slightly larger border radius for rounded corners */
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
    </style>
    @endpush
@endsection
