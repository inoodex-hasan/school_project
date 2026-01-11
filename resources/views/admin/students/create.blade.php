@extends('admin.adminlayout')

@section('content')
<div class="student-create-container">
    <h1>Add New Student</h1>

    <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div class="form-group">
            <label for="class">Class</label>
            <select name="class_id" id="class" class="filter-select" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="section">Section</label>
            <select name="section_id" id="section" class="filter-select" required>
                <option value="">Select Section</option>
            </select>
        </div>

        <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" name="roll" id="roll" required>
        </div>

        <div class="form-group">
            <label for="photo">Student Photo</label>
            <input type="file" name="photo" id="photo" accept="image/*">
        </div>

        <button type="submit" class="btn-submit">Save Student</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    $('#class').on('change', function () {
        let classId = $(this).val();

        // Clear section dropdown first
        $('#section').empty().append('<option value="">Select Section</option>');

        if (classId) {
            $.ajax({
                url: '/admin/sections/' + classId,
                type: 'GET',
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


<!-- @push('styles')
<link rel="stylesheet" href="{{ asset('css/students/create.css') }}">
@endpush -->
