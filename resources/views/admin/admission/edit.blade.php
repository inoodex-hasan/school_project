@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Admission Student</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.admission.index') }}" class="btn btn-primary px-4 rounded-2 shadow-sm">
                                    <i class="fas fa-arrow-left mr-1"></i> Back to List
                                </a>    
                            </div>
                        </div>
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('admin.admission.update', $admission->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- 1. Personal Information --}}
                                <h5 class="text-primary mb-3"><i class="fas fa-user mr-2"></i>Personal Information</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ old('name', $admission->name) }}"
                                            class="form-control" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Male"
                                                {{ old('gender', $admission->gender) == 'Male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="Female"
                                                {{ old('gender', $admission->gender) == 'Female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth"
                                            value="{{ old('date_of_birth', $admission->dob) }}" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Religion</label>
                                        <select name="religion" class="form-control">
                                            @foreach (['Islam', 'Hindu', 'Christian', 'Buddhist', 'other'] as $religion)
                                                <option value="{{ $religion }}"
                                                    {{ old('religion', $admission->religion) == $religion ? 'selected' : '' }}>
                                                    {{ $religion }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Blood Group</label>
                                        <input type="text" name="blood_group"
                                            value="{{ old('blood_group', $admission->blood_group) }}" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Birth Certificate No</label>
                                        <input type="text" name="birth_certificate_no"
                                            value="{{ old('birth_certificate_no', $admission->birth_certificate_no) }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Student Photo</label>
                                        <div class="d-flex align-items-center">
                                            @if ($admission->student->photo)
                                                <img src="{{ asset('storage/' . $admission->student->photo) }}"
                                                    class="rounded mr-3 border" width="50" height="50"
                                                    style="object-fit: cover;">
                                            @endif
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input"
                                                    accept="image/*">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                {{-- 2. Parents Information --}}
                                <h5 class="text-primary mb-3"><i class="fas fa-users mr-2"></i>Parents Information</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Father's Name</label>
                                        <input type="text" name="fathers_name"
                                            value="{{ old('fathers_name', $admission->fathers_name) }}"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mother's Name</label>
                                        <input type="text" name="mothers_name"
                                            value="{{ old('mothers_name', $admission->mothers_name) }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <hr>

                                {{-- 3. Contact Information --}}
                                <h5 class="text-primary mb-3"><i class="fas fa-address-book mr-2"></i>Contact Information
                                </h5>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone <span class="text-danger">*</span></label>
                                        <input type="text" name="phone"
                                            value="{{ old('phone', $admission->phone) }}" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email"
                                            value="{{ old('email', $admission->email) }}" class="form-control">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Address <span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control" rows="2" required>{{ old('address', $admission->address) }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                {{-- 4. Academic Information --}}
                                <h5 class="text-primary mb-3"><i class="fas fa-school mr-2"></i>Academic Information</h5>
                                <div class="row mb-4">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Class <span class="text-danger">*</span></label>
                                        <select name="class_id" id="class" class="form-control" required>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}"
                                                    {{ old('class_id', $admission->student->class_id) == $class->id ? 'selected' : '' }}>
                                                    {{ $class->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Section <span class="text-danger">*</span></label>
                                        <select name="section_id" id="section" class="form-control" required>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}"
                                                    {{ old('section_id', $admission->student->section_id) == $section->id ? 'selected' : '' }}>
                                                    {{ $section->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Roll Number <span class="text-danger">*</span></label>
                                        <input type="text" name="roll"
                                            value="{{ old('roll', $admission->student->roll) }}" class="form-control"
                                            required>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-lg shadow-sm px-5">
                                        <i class="fas fa-save mr-2"></i> Update Admission
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Custom file input label update
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });

                // Class -> Section Dynamic Loading
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
@endsection
