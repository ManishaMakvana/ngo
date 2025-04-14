@extends('layouts.projectmanager')

@section('content')

<div class="box">
    <h2>Add New User</h2>

    <form method="POST" action="{{ route('manager.storeUser') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="programid" class="form-label">Program ID</label>
            <input type="text" name="programid" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Create User</button>
    </form>
</div>

@endsection
