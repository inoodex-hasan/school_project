@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm border-0">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Student Result</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.result.index') }}"
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

                            <form action="{{ route('admin.result.update', $result->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="student_id" class="form-label">Student <span
                                            class="text-danger">*</span></label>
                                    <select name="student_id" id="student_id"
                                        class="form-control @error('student_id') is-invalid @enderror" required>
                                        <option value="">-- Select Student --</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}"
                                                {{ $student->id == $result->student_id ? 'selected' : '' }}>
                                                {{ $student->name }} (Class: {{ $student->class }}, Roll:
                                                {{ $student->roll }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('student_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="grade" class="form-label">Grade <span
                                            class="text-danger">*</span></label>
                                    <select name="grade" id="grade"
                                        class="form-control @error('grade') is-invalid @enderror" required>
                                        <option value="">-- Select Grade --</option>
                                        @foreach (['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D', 'F'] as $grade)
                                            <option value="{{ $grade }}"
                                                {{ $result->grade == $grade ? 'selected' : '' }}>{{ $grade }}</option>
                                        @endforeach
                                    </select>
                                    @error('grade')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="{{ route('admin.result.index') }}"
                                        class="btn btn-secondary btn-lg me-2 px-4">Cancel</a>
                                    <button type="submit" class="btn btn-success btn-lg px-4">Update Result</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
