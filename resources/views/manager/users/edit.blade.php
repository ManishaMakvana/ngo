@extends('layouts.projectmanager')

@section('content')

<div class="box">
    <h2>Edit User</h2>

    <form method="POST" action="{{ route('manager.updateUser', $user->id) }}">
    @csrf
    @method('PUT') <!-- Keep this only if your route uses Route::put() -->

    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
    </div>

    <div class="mb-3">
        <label for="programid" class="form-label">Program ID</label>
        <input type="text" name="programid" class="form-control" value="{{ $user->programid }}" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">New Password (Leave empty to keep current password)</label>
        <input type="password" name="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Update User</button>
</form>

</div>

@endsection
