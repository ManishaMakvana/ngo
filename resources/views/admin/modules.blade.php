@extends('layouts.admin')

@section('content')

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="module-header">
    <h2>Modules List</h2>

    <!-- Search Form -->
    <form method="GET" action="{{ route('admin.modules') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by Title or Program ID" value="{{ request('search') }}">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>

    <!-- Per Page Dropdown -->
    <form method="GET" action="{{ route('admin.modules') }}" class="mb-3">
        <div class="input-group">
            <select name="per_page" class="form-control" onchange="this.form.submit()">
                <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>Show 10</option>
                <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>Show 20</option>
                <option value="50" {{ request('per_page') == '50' ? 'selected' : '' }}>Show 50</option>
                <option value="100" {{ request('per_page') == '100' ? 'selected' : '' }}>Show 100</option>
            </select>
        </div>
    </form>

    <a href="{{ route('admin.createProgram') }}" class="btn btn-primary add-module-btn">Add New Module</a>
</div>

<!-- Modules Table -->
<table class="table table-striped table-bordered table-sm">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Program ID</th>
            <th>Module ID</th>
            <th>STD</th>
            <th>Document Type</th>
            <th>Title</th>
            <th>Publish Link</th>
            <th>Presentation Link</th>
            <th>YouTube Voiceover</th>
            <th>Google Slide</th>
            <th>Worksheet</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($programs as $program)
            <tr>
                <td>{{ $program->id }}</td>
                <td>{{ $program->programid }}</td>
                <td>{{ $program->module_id }}</td>
                <td>{{ $program->std }}</td>
                <td>{{ $program->document_type }}</td>
                <td>{{ $program->title }}</td>
                <td><a href="{{ $program->publish_link }}" target="_blank" class="btn btn-info btn-sm">View</a></td>
                <td><a href="{{ $program->presentation_link }}" target="_blank" class="btn btn-info btn-sm">View</a></td>
                <td><a href="{{ $program->youtube_voiceover }}" target="_blank" class="btn btn-info btn-sm">Watch</a></td>
                <td><a href="{{ $program->google_slide }}" target="_blank" class="btn btn-info btn-sm">View</a></td>
                <td><a href="{{ $program->worksheet }}" target="_blank" class="btn btn-success btn-sm">Download</a></td>
                <td>
    <!-- Edit Button -->
    <a href="{{ route('admin.modules.edit', $program->id) }}" class="btn btn-warning btn-sm">Edit</a>

    <form action="{{ route('admin.modules.destroy', $program->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">
        Delete
    </button>
</form>

</td>

            </tr>
        @empty
            <tr>
                <td colspan="12" class="text-center">No modules found</td>
            </tr>
        @endforelse
    </tbody>
</table>

<!-- Pagination Links -->
<div class="d-flex justify-content-center">
    {{ $programs->appends(request()->except('page'))->links() }}
</div>

@endsection
