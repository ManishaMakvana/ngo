@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4" style="width: 400px; border-radius: 10px;">
        <div class="text-center">
            <h4 class="fw-bold"> Project Manager Login</h4>
        </div>
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('manager.login.submit') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label fw-semibold">Username:</label>
                    <input type="text" class="form-control" name="username" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>

           
        </div>
    </div>
</div>
@endsection

@push('style')

<style>
    body {
    background-color: #f8f9fa;
}

.card {
    border: none;
    border-radius: 10px;
}

.card h4 {
    font-size: 1.5rem;
}

.btn-primary {
    background-color: #3b82f6;
    border-color: #3b82f6;
}

.btn-primary:hover {
    background-color: #2563eb;
    border-color: #2563eb;
}

</style>
@endpush