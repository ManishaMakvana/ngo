@extends('layouts.admin')

@section('content')
    <h2>Add New Module</h2>

    <!-- Display success message if any -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Module Add Form -->
    <form action="{{ route('admin.storeProgram') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="programid">Program ID</label>
            <input type="text" id="programid" name="programid" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="module_id">Module ID</label>
            <input type="text" id="module_id" name="module_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="std">STD</label>
            <input type="text" id="std" name="std" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="document_type">Document Type</label>
            <input type="text" id="document_type" name="document_type" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="publish_link">Publish Link</label>
            <input type="url" id="publish_link" name="publish_link" class="form-control">
        </div>

        <div class="form-group">
            <label for="presentation_link">Presentation Link</label>
            <input type="url" id="presentation_link" name="presentation_link" class="form-control">
        </div>

        <div class="form-group">
            <label for="youtube_voiceover">YouTube Voiceover</label>
            <input type="url" id="youtube_voiceover" name="youtube_voiceover" class="form-control">
        </div>

        <div class="form-group">
            <label for="google_slide">Google Slide</label>
            <input type="url" id="google_slide" name="google_slide" class="form-control">
        </div>

        <div class="form-group">
            <label for="worksheet">Worksheet</label>
            <input type="url" id="worksheet" name="worksheet" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Module</button>
        </div>
    </form>
@endsection



@push('styles')
<link rel="stylesheet" href="{{ asset('css/module.css') }}">

@endpush
