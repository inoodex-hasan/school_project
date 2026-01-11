@extends('admin.adminlayout')

@section('content')
<div class="student-edit-container">
    <h1>Edit Student</h1>

    <form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $student->name) }}" required>
            @error('name')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
    <label for="class">Class</label>
    <select name="class_id" id="class" class="form-control" required>
        <option value="">-- Select Class --</option>
        @foreach($classes as $class)
            <option value="{{ $class->id }}" 
                {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}>
                {{ $class->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="section">Section</label>
    <select name="section_id" id="section" class="form-control" required>
        <option value="">-- Select Section --</option>
        @foreach($sections as $section)
            <option value="{{ $section->id }}" 
                {{ old('section_id', $student->section_id) == $section->id ? 'selected' : '' }}>
                {{ $section->name }}
            </option>
        @endforeach
    </select>
</div>


        <div class="form-group">
            <label for="roll">Roll</label>
            <input type="text" name="roll" id="roll" value="{{ old('roll', $student->roll) }}" required>
            @error('roll')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="photo">Student Photo</label>
            @if($student->photo)
                <div>
                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" width="100">
                </div>
            @endif
            <input type="file" name="photo" id="photo" accept="image/*">
            @error('photo')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-submit">Update Student</button>
    </form>
</div>
@endsection


@push('scripts')
<script>
$(document).ready(function () {
    $('#class').on('change', function () {
        let classId = $(this).val();
        $('#section').empty().append('<option value="">-- Select Section --</option>');

        if (classId) {
            $.ajax({
                url: '/admin/sections/' + classId,
                type: 'GET',
                success: function(sections) {
                    $.each(sections, function(key, section) {
                        $('#section').append('<option value="'+ section.id +'">'+ section.name +'</option>');
                    });
                },
                error: function() {
                    alert('Unable to load sections for this class.');
                }
            });
        }
    });
});
</script>

@endpush
