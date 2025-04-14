@extends('layouts.program')

@section('title', 'Create Report')

@push('styles')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px;
    }
    .container {
        max-width: 600px;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin: auto;
    }
    h3 {
        color: #2c3e50;
    }
    label {
        font-weight: bold;
        display: block;
        margin-top: 10px;
        color: #333;
    }
    input, textarea, select {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }
    input:focus, textarea:focus, select:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
    }
    button {
        background-color: #3498db;
        color: white;
        padding: 10px 15px;
        border: none;
        margin-top: 15px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
        font-weight: bold;
        border-radius: 4px;
        transition: background 0.3s ease;
    }
    button:hover {
        background-color: #2980b9;
    }
    .btn-danger {
        display: block;
        text-align: center;
        font-weight: bold;
    }
</style>
@endpush

@section('content')
<div class="container">
    <h3 class="text-center mb-4">Create Report</h3>

   

        

       
        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Program Title</label>
        <select name="title" id="program_title" required>
            <option value="">Select a Title</option>
            @foreach($programs as $program)
                <option value="{{ $program->title }}" data-programid="{{ $program->programid }}">
                    {{ $program->title }}
                </option>
            @endforeach
        </select>
        
    <!-- Auto-filled and hidden -->
    <input type="hidden" name="username" value="{{ Auth::user()->username }}">
    <input type="hidden" name="program_id" value="{{ Auth::user()->programid }}">

    <!-- Display only for user reference -->
    <label>Username</label>
    <input type="text" value="{{ Auth::user()->username }}" readonly>

    <label>Program ID</label>
    <input type="text" value="{{ Auth::user()->programid }}" readonly>

    <!-- Remove Program Title dropdown if not needed -->
    {{-- <label>Program Title</label>
    <select name="title" required>
        <option value="">Select a Title</option>
        @foreach($programs as $program)
            <option value="{{ $program->title }}">{{ $program->title }}</option>
        @endforeach
    </select> --}}

    <label>School</label>
    <input type="text" name="school" required>

    <label>Activity Name</label>
    <input type="text" name="activity_name" required>

    <label>Number of Girls</label>
    <input type="number" name="girls" required>

    <label>Number of Boys</label>
    <input type="number" name="boys" required>

    <label>Teacher</label>
    <input type="text" name="teacher" required>

    <label>Due Date</label>
    <input type="date" name="due_date" required>

    <label>Basic Description</label>
    <textarea name="basic_description" rows="4" required></textarea>

    <label>Google Photo</label>
    <input type="url" name="google_photos" required>

    <label>Hero Pic</label>
    <input type="file" name="hero_pic" accept="image/*" required>

    <button type="submit">Submit Report</button>
</form>

<a href="{{ route('program') }}" class="btn btn-danger w-100 mt-3">← Back to Programs</a>

</div>
@endsection

