@extends('layouts.program')

@section('content')

<div class="container mt-4">
    <h2 class="mb-4 text-center text-primary">My Program Modules</h2>

    <div class="card p-3 mb-3 shadow-sm">
        <p><strong>Program ID:</strong> {{ Auth::user()->programid }}</p>
        <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                </tr>
            </thead>
            <tbody>
                @foreach($programs as $program)
                    <tr>
                        <td>{{ $program->id }}</td>
                        <td>{{ $program->programid }}</td>
                        <td>{{ $program->module_id }}</td>
                        <td>{{ $program->std }}</td>
                        <td>{{ $program->document_type }}</td>
                        <td>{{ $program->title }}</td>
                        <td><a href="{{ $program->publish_link }}" class="btn btn-primary btn-sm" target="_blank">View</a></td>
                        <td><a href="{{ $program->presentation_link }}" class="btn btn-info btn-sm" target="_blank">View</a></td>
                        <td><a href="{{ $program->youtube_voiceover }}" class="btn btn-danger btn-sm" target="_blank">Watch</a></td>
                        <td><a href="{{ $program->google_slide }}" class="btn btn-warning btn-sm" target="_blank">View</a></td>
                        <td><a href="{{ $program->worksheet }}" class="btn btn-success btn-sm" target="_blank">Download</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
    <div> {{ $programs->links() }} </div>
    <div> <strong>Total Modules:</strong> {{ $programs->total() }} </div>
</div>

   
</div>




@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/programs.css') }}">
   
@endpush