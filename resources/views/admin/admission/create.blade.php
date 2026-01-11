@extends('admin.adminlayout')

@section('content')
    <div class="student-create-container">
        <h1>Add New Admission Student</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.admission.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Full Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name" required>
            </div>

            <!-- Father's Name -->
            <div class="form-group">
                <label for="fathers_name">Father's Name</label>
                <input type="text" name="fathers_name" id="fathers_name">
            </div>

            <!-- Mother's Name -->
            <div class="form-group">
                <label for="mothers_name">Mother's Name</label>
                <input type="text" name="mothers_name" id="mothers_name">
            </div>

            <!-- Father Image -->
            <div class="form-group">
                <label for="father_image">Father's Photo</label>
                <input type="file" name="father_image" id="father_image" accept="image/*">
            </div>

            <!-- Mother Image -->
            <div class="form-group">
                <label for="mother_image">Mother's Photo</label>
                <input type="file" name="mother_image" id="mother_image" accept="image/*">
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <!-- Date of Birth -->
            <div class="form-group">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" name="date_of_birth" id="date_of_birth" required>
            </div>

            <!-- Birth Certificate No -->
            <div class="form-group">
                <label for="birth_certificate_no">Birth Certificate No</label>
                <input type="text" name="birth_certificate_no" id="birth_certificate_no">
            </div>

            <!-- Blood Group -->
            <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <input type="text" name="blood_group" id="blood_group">
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>

            <!-- Religion -->
            <div class="form-group">
                <label for="religion">Religion</label>
                <select name="religion" id="religion">
                    <option value="">Select Religion</option>
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Christian">Christian</option>
                    <option value="Buddhist">Buddhist</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Nationality -->
            <div class="form-group">
                <label for="nationality">Nationality</label>
                <input type="text" name="nationality" id="nationality" value="Bangladesh" readonly>
            </div>

            <!-- Phone -->
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" required>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" required></textarea>
            </div>

            <!-- Class -->
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class_id" id="class" class="filter-select" required>
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Section -->
            <div class="form-group">
                <label for="section">Section</label>
                <select name="section_id" id="section" class="filter-select" required>
                    <option value="">Select Section</option>
                </select>
            </div>

            <!-- Roll -->
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" name="roll" id="roll" required>
            </div>

            <!-- Student Photo -->
            <div class="form-group">
                <label for="photo">Student Photo</label>
                <input type="file" name="photo" id="photo" accept="image/*">
            </div>

            <button type="submit" class="btn-submit">Create</button>
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
