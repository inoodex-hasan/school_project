@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Add New Admission</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.admission.index') }}"
                                    class="btn btn-primary px-4 rounded-2 shadow-sm">
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

                            <form action="{{ route('admin.admission.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                {{-- 1. Personal Information --}}
                                <h5 class="text-primary mb-3"><i class="fas fa-user mr-2"></i>Personal Information</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="gender" class="form-label">Gender <span
                                                class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="date_of_birth" class="form-label">Date of Birth <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="religion" class="form-label">Religion</label>
                                        <select name="religion" id="religion" class="form-control">
                                            <option value="">Select Religion</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Christian">Christian</option>
                                            <option value="Buddhist">Buddhist</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="blood_group" class="form-label">Blood Group</label>
                                        <input type="text" name="blood_group" id="blood_group" class="form-control">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="nationality" class="form-label">Nationality</label>
                                        <input type="text" name="nationality" id="nationality" class="form-control"
                                            value="Bangladesh" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="birth_certificate_no" class="form-label">Birth Certificate No</label>
                                        <input type="text" name="birth_certificate_no" id="birth_certificate_no"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="student_photo" class="form-label">Student Photo</label>
                                        <div class="custom-file">
                                            <input type="file" name="photo" id="student_photo" class="custom-file-input"
                                                accept="image/*">
                                            <label class="custom-file-label" for="student_photo">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                {{-- 2. Parents Information --}}
                                <h5 class="text-primary mb-3"><i class="fas fa-users mr-2"></i>Parents Information</h5>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label for="fathers_name" class="form-label">Father's Name</label>
                                        <input type="text" name="fathers_name" id="fathers_name" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="father_image" class="form-label">Father's Photo</label>
                                        <div class="custom-file">
                                            <input type="file" name="father_image" id="father_image"
                                                class="custom-file-input" accept="image/*">
                                            <label class="custom-file-label" for="father_image">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mothers_name" class="form-label">Mother's Name</label>
                                        <input type="text" name="mothers_name" id="mothers_name" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="mother_image" class="form-label">Mother's Photo</label>
                                        <div class="custom-file">
                                            <input type="file" name="mother_image" id="mother_image"
                                                class="custom-file-input" accept="image/*">
                                            <label class="custom-file-label" for="mother_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                {{-- 3. Contact Information --}}
                                <h5 class="text-primary mb-3"><i class="fas fa-address-book mr-2"></i>Contact Information
                                </h5>
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="address" class="form-label">Address <span
                                                class="text-danger">*</span></label>
                                        <textarea name="address" id="address" class="form-control" rows="2"
                                            required></textarea>
                                    </div>
                                </div>

                                <hr>

                                {{-- 4. Academic Information --}}
                                <h5 class="text-primary mb-3"><i class="fas fa-school mr-2"></i>Academic Information</h5>
                                <div class="row mb-4">
                                    <div class="col-md-4 mb-3">
                                        <label for="class" class="form-label">Class <span
                                                class="text-danger">*</span></label>
                                        <select name="class_id" id="class" class="form-control" required>
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="section" class="form-label">Section <span
                                                class="text-danger">*</span></label>
                                        <select name="section_id" id="section" class="form-control" required>
                                            <option value="">Select Section</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="roll" class="form-label">Roll Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="roll" id="roll" class="form-control" required>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary btn-lg shadow-sm px-5">
                                        <!-- <i class="fas fa-save mr-2"></i>  -->
                                        Create Admission
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
            $(document).ready(function () {
                // Custom file input label update
                $(".custom-file-input").on("change", function () {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });

                // Class -> Section Dynamic Loading
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
                                    $('#section').append('<option value="' + section.id +
                                        '">' + section.name + '</option>');
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
@endsection