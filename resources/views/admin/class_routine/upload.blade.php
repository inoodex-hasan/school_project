@extends('admin.adminlayout')

@section('content')
<div class="routine-upload-container">
    <h1>Upload Class Routine PDF</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form action="{{ route('admin.class_routine.store_upload') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Title</label>
        <input type="text" name="title" value="{{ old('title') }}" required>

        <label>PDF File</label>
        <input type="file" name="file" accept="application/pdf" required>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Upload Routine</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/class_routine/upload.css') }}">
@endpush