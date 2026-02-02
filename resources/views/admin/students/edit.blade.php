@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Student</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.students.index') }}" class="btn btn-primary px-4 rounded-2 shadow-sm">
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

                            <form action="{{ route('admin.students.update', $student->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    {{-- Full Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name', $student->name) }}" required>
                                    </div>

                                    {{-- Roll --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="roll" class="form-label">Roll Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="roll" id="roll" class="form-control"
                                            value="{{ old('roll', $student->roll) }}" required>
                                    </div>

                                    {{-- Class --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="class" class="form-label">Class <span
                                                class="text-danger">*</span></label>
                                        <select name="class_id" id="class" class="form-control" required>
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}"
                                                    {{ old('class_id', $student->class_id) == $class->id ? 'selected' : '' }}>
                                                    {{ $class->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Section --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="section" class="form-label">Section <span
                                                class="text-danger">*</span></label>
                                        <select name="section_id" id="section" class="form-control" required>
                                            <option value="">Select Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}"
                                                    {{ old('section_id', $student->section_id) == $section->id ? 'selected' : '' }}>
                                                    {{ $section->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Photo --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="photo" class="form-label">Student Photo</label>
                                        <div class="d-flex align-items-center">
                                            @if ($student->photo)
                                                <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo"
                                                    class="rounded mr-3 border" width="60" height="60"
                                                    style="object-fit: cover;">
                                            @endif
                                            <div class="custom-file">
                                                <input type="file" name="photo" id="photo" class="custom-file-input"
                                                    accept="image/*">
                                                <label class="custom-file-label" for="photo">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg shadow-sm px-5">
                                        <i class="fas fa-save mr-2"></i> Update Student
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
