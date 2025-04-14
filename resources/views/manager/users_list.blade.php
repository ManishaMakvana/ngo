@extends('layouts.projectmanager')

@section('content')
<div class="box">
    <h2>Users List</h2>

    <!-- Add User Button -->
    <a href="{{ route('manager.createUser') }}" class="btn btn-primary mb-3">Add New User</a>

    <!-- Search Form -->
    <form method="GET" action="{{ route('manager.users') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by username" value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>

    <!-- Per Page Dropdown -->
    <form method="GET" action="{{ route('manager.users') }}" class="mb-3">
        <div class="input-group">
            <select name="per_page" class="form-control" onchange="this.form.submit()">
                <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                <option value="30" {{ request('per_page') == '30' ? 'selected' : '' }}>Show 30</option>
            </select>
        </div>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Program ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->program_id }}</td>
                    <td>
                        <a href="{{ route('manager.editUser', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('manager.deleteUser', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No users found</td></tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $users->appends(request()->except('page'))->links() }}
    </div>
</div>
@endsection
