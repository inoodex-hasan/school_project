@extends('admin.adminlayout')

@section('content')
<div class="exam-routine-wrapper">
    <div class="exam-routine-container">
        <h2>Upload Exam Routine</h2>

        <!-- Upload form -->
        <form action="{{ route('admin.exam_routine.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Routine Title" required>
            <input type="file" name="file" accept="application/pdf" required>
            <button type="submit">Upload</button>
            @if ($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </form>
        <!-- End of upload form -->
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/exam_routine/create.css') }}">
@endpush