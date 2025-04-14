@extends('layouts.program')

@push('styles')
<style>
    .form-container {
        max-width: 500px;
        margin: auto;
    }
    .form-label {
        font-weight: bold;
    }
</style>
@endpush

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4 form-container">
        <h2 class="text-center text-primary">Change Password</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.updatePassword') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Current Password:</label>
                <div class="input-group">
                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('current_password')">👁</button>
                </div>
            </div>

            <div class="mb-3 ">
                <label class="form-label">New Password:</label>
                <div class="input-group">
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                    <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('new_password')">👁</button>
                </div>
            </div>

           <div class="mb-3 ">
    <label class="form-label">Confirm New Password:</label>
    <div class="input-group">
        <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
        <button type="button" class="btn btn-outline-secondary" onclick="togglePassword('new_password_confirmation')">👁</button>
    </div>
</div>


            <button type="submit" class="btn btn-primary w-100">Update Password</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function togglePassword(fieldId) {
        var field = document.getElementById(fieldId);
        field.type = (field.type === "password") ? "text" : "password";
    }
</script>
@endpush

@endsection
