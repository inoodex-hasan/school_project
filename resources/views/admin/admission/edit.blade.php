@extends('admin.adminlayout')

@section('content')
<div class="student-create-container">
    <h1>Edit Admission Student</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.admission.update', $admission->id) }}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Full Name -->
        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name"
                value="{{ old('name', $admission->name) }}" required>
        </div>

        <!-- Father's Name -->
        <div class="form-group">
            <label>Father's Name</label>
            <input type="text" name="fathers_name"
                value="{{ old('fathers_name', $admission->fathers_name) }}">
        </div>

        <!-- Mother's Name -->
        <div class="form-group">
            <label>Mother's Name</label>
            <input type="text" name="mothers_name"
                value="{{ old('mothers_name', $admission->mothers_name) }}">
        </div>

        <!-- Gender -->
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select</option>
                <option value="Male"
                    {{ old('gender', $admission->gender) == 'Male' ? 'selected' : '' }}>
                    Male
                </option>
                <option value="Female"
                    {{ old('gender', $admission->gender) == 'Female' ? 'selected' : '' }}>
                    Female
                </option>
            </select>
        </div>

        <!-- Date of Birth -->
        <div class="form-group">
            <label>Date of Birth</label>
            <input type="date" name="date_of_birth"
                value="{{ old('date_of_birth', $admission->dob) }}" required>
        </div>

        <!-- Birth Certificate -->
        <div class="form-group">
            <label>Birth Certificate No</label>
            <input type="text" name="birth_certificate_no"
                value="{{ old('birth_certificate_no', $admission->birth_certificate_no) }}">
        </div>

        <!-- Blood Group -->
        <div class="form-group">
            <label>Blood Group</label>
            <input type="text" name="blood_group"
                value="{{ old('blood_group', $admission->blood_group) }}">
        </div>

        <!-- Email -->
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"
                value="{{ old('email', $admission->email) }}">
        </div>

        <!-- Religion -->
        <div class="form-group">
            <label>Religion</label>
            <select name="religion">
                @foreach (['Islam','Hindu','Christian','Buddhist','other'] as $religion)
                    <option value="{{ $religion }}"
                        {{ old('religion', $admission->religion) == $religion ? 'selected' : '' }}>
                        {{ $religion }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone"
                value="{{ old('phone', $admission->phone) }}" required>
        </div>

        <!-- Address -->
        <div class="form-group">
            <label>Address</label>
            <textarea name="address" required>{{ old('address', $admission->address) }}</textarea>
        </div>

        <!-- Class -->
        <div class="form-group">
            <label>Class</label>
            <select name="class_id" id="class" required>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}"
                        {{ old('class_id', $admission->student->class_id) == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Section -->
        <div class="form-group">
            <label>Section</label>
            <select name="section_id" id="section" required>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}"
                        {{ old('section_id', $admission->student->section_id) == $section->id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Roll -->
        <div class="form-group">
            <label>Roll</label>
            <input type="text" name="roll"
                value="{{ old('roll', $admission->student->roll) }}" required>
        </div>

        <!-- Student Photo -->
        <div class="form-group">
            <label>Student Photo</label><br>
            @if ($admission->student->photo)
                <img src="{{ asset('storage/'.$admission->student->photo) }}"
                     width="80" class="mb-2">
            @endif
            <input type="file" name="photo">
        </div>

        <button class="btn-submit">Update</button>
    </form>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#class').on('change', function() {
                let classId = $(this).val();

                // Clear section dropdown first
                $('#section').empty().append('<option value="">Select Section</option>');

                if (classId) {
                    $.ajax({
                        url: '/admin/sections/' + classId,
                        type: 'GET',
                        success: function(sections) {
                            $.each(sections, function(key, section) {
                                $('#section').append('<option value="' + section.id +
                                    '">' + section.name + '</option>');
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
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/students/create.css') }}">
@endpush
