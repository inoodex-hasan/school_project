@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm border-0">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Class Routine</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.class_routine.index') }}"
                                    class="btn btn-outline-primary px-4 rounded-2">
                                    <i class="fas fa-arrow-left me-2"></i> Back
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.class_routine.update', $routine->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="class" class="form-label">Class <span
                                                class="text-danger">*</span></label>
                                        <select name="class_id" id="class"
                                            class="form-control @error('class_id') is-invalid @enderror" required>
                                            <option value="">Select Class</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}"
                                                    {{ old('class_id', $routine->class_id) == $class->id ? 'selected' : '' }}>
                                                    {{ $class->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="section" class="form-label">Section <span
                                                class="text-danger">*</span></label>
                                        <select name="section_id" id="section"
                                            class="form-control @error('section_id') is-invalid @enderror" required>
                                            <option value="">Select Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}"
                                                    {{ old('section_id', $routine->section_id) == $section->id ? 'selected' : '' }}>
                                                    {{ $section->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('section_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="day" class="form-label">Day <span
                                                class="text-danger">*</span></label>
                                        <select name="day" id="day"
                                            class="form-control @error('day') is-invalid @enderror" required>
                                            @foreach (['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'] as $day)
                                                <option value="{{ $day }}"
                                                    {{ old('day', $routine->day) == $day ? 'selected' : '' }}>{{ $day }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('day')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="subject_id" class="form-label">Subject <span
                                                class="text-danger">*</span></label>
                                        <select name="subject_id" id="subject_id"
                                            class="form-control @error('subject_id') is-invalid @enderror" required>
                                            <option value="">Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}"
                                                    {{ old('subject_id', $routine->subject_id) == $subject->id ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subject_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="teacher_id" class="form-label">Teacher <span
                                            class="text-danger">*</span></label>
                                    <select name="teacher_id" id="teacher_id"
                                        class="form-control @error('teacher_id') is-invalid @enderror" required>
                                        <option value="">Select Teacher</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}"
                                                {{ old('teacher_id', $routine->teacher_id) == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="start_time" class="form-label">Start Time <span
                                                class="text-danger">*</span></label>
                                        <input type="time" name="start_time" id="start_time"
                                            class="form-control @error('start_time') is-invalid @enderror"
                                            value="{{ old('start_time', $routine->start_time) }}" required>
                                        @error('start_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-4">
                                        <label for="end_time" class="form-label">End Time <span
                                                class="text-danger">*</span></label>
                                        <input type="time" name="end_time" id="end_time"
                                            class="form-control @error('end_time') is-invalid @enderror"
                                            value="{{ old('end_time', $routine->end_time) }}" required>
                                        @error('end_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="{{ route('admin.class_routine.index') }}"
                                        class="btn btn-secondary btn-lg me-2 px-4">Cancel</a>
                                    <button type="submit" class="btn btn-primary btn-lg px-4">Update Routine</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#class').on('change', function() {
                let classId = $(this).val();
                $('#section').empty().append('<option value="">Select Section</option>');

                if (classId) {
                    $.ajax({
                        url: '/admin/sections/' + classId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(sections) {
                            $.each(sections, function(key, section) {
                                $('#section').append('<option value="' + section.id + '">' +
                                    section.name + '</option>');
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
