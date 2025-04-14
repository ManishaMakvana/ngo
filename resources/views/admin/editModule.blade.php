@extends('layouts.admin')

@section('content')

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="module-header">
        <h2>Edit Module</h2>
    </div>

    <!-- Edit Form -->
    <form action="{{ route('admin.modules.update', $program->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="programid">Program ID</label>
            <input type="text" class="form-control" id="programid" name="programid" value="{{ old('programid', $program->programid) }}" required>
        </div>

        <div class="form-group">
            <label for="module_id">Module ID</label>
            <input type="text" class="form-control" id="module_id" name="module_id" value="{{ old('module_id', $program->module_id) }}" required>
        </div>

        <div class="form-group">
            <label for="std">STD</label>
            <input type="text" class="form-control" id="std" name="std" value="{{ old('std', $program->std) }}" required>
        </div>

        <div class="form-group">
            <label for="document_type">Document Type</label>
            <input type="text" class="form-control" id="document_type" name="document_type" value="{{ old('document_type', $program->document_type) }}" required>
        </div>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $program->title) }}" required>
        </div>

        <div class="form-group">
            <label for="publish_link">Publish Link</label>
            <input type="url" class="form-control" id="publish_link" name="publish_link" value="{{ old('publish_link', $program->publish_link) }}">
        </div>

        <div class="form-group">
            <label for="presentation_link">Presentation Link</label>
            <input type="url" class="form-control" id="presentation_link" name="presentation_link" value="{{ old('presentation_link', $program->presentation_link) }}">
        </div>

        <div class="form-group">
            <label for="youtube_voiceover">YouTube Voiceover</label>
            <input type="url" class="form-control" id="youtube_voiceover" name="youtube_voiceover" value="{{ old('youtube_voiceover', $program->youtube_voiceover) }}">
        </div>

        <div class="form-group">
            <label for="google_slide">Google Slide</label>
            <input type="url" class="form-control" id="google_slide" name="google_slide" value="{{ old('google_slide', $program->google_slide) }}">
        </div>

        <div class="form-group">
            <label for="worksheet">Worksheet</label>
            <input type="url" class="form-control" id="worksheet" name="worksheet" value="{{ old('worksheet', $program->worksheet) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Module</button>
    </form>

@endsection

@push('styles')
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
@endpush
