@extends('layouts.projectmanager')

@section('content')

<div class="box">
<h2>Users List</h2>
<div class="head d-flex align-items-center gap-3">
    <a href="{{ route('manager.createUser') }}" class="btn btn-primary">Add New User</a>

    <!-- Search Form -->
    <form method="GET" action="{{ route('manager.users') }}" class="d-flex" style="width: 300px;">
        <input type="text" name="search" class="form-control me-7" placeholder="Search by username" value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
</div>

   

    <table class="table table-bordered">
        <thead>
            <tr>
                
                <th>Username</th>
                <th>program_id</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->programid }}</td>
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

    <div class="d-flex justify-content-center mt-3">
        {{ $users->appends(request()->except('page'))->links() }}
    </div>
    <div><strong>Total users:</strong> {{ $users->total() }} </div>
</div>

@endsection
