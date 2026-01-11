@extends('admin.adminlayout')

@section('content')
<div class="routine-form-container">
    <h1>Add Class Routine</h1>

    <form action="{{ route('admin.class_routine.store') }}" method="POST">
        @csrf

        <label>Class</label>
        <select name="class_id" id="class" required>
            <option value="">Select Class</option>
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
            @endforeach
        </select>

        <label>Section</label>
        <select name="section_id" id="section" required>
            <option value="">Select Section</option>
        </select>

        <label>Day</label>
        <select name="day" required>
            @foreach(['Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday'] as $day)
                <option value="{{ $day }}">{{ $day }}</option>
            @endforeach
        </select>

        <label>Subject</label>
        <select name="subject_id" required>
            <option value="">Select Subject</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>

        <label>Teacher</label>
        <select name="teacher_id" required>
            <option value="">Select Teacher</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
            @endforeach
        </select>

        <label>Start Time</label>
        <input type="time" name="start_time" required>

        <label>End Time</label>
        <input type="time" name="end_time" required>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Save Routine</button>
            <a href="{{ route('admin.class_routine.index') }}" class="btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection


@push('scripts')
<script>
jQuery(document).ready(function($){
    $('#class').on('change', function () {
        let classId = $(this).val();
        $('#section').empty().append('<option value="">Select Section</option>');

        if (classId) {
            $.ajax({
                url: '/admin/sections/' + classId,
                type: 'GET',
                dataType: 'json',
                success: function (sections) {
                    $.each(sections, function (key, section) {
                        $('#section').append('<option value="'+ section.id +'">'+ section.name +'</option>');
                    });
                },
                error: function () {
                    alert('Unable to load sections for this class.');
                }
            });
        }
    });
});
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/class_routine/create.css') }}">
@endpush
