@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm border-0">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Add Student Result</h4>
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

                            <form action="{{ route('admin.result.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="exam_type_id" class="form-label">Exam Type <span
                                                class="text-danger">*</span></label>
                                        <select name="exam_type_id" id="exam_type_id"
                                            class="form-control @error('exam_type_id') is-invalid @enderror" required>
                                            <option value="">-- Select Exam Type --</option>
                                            @foreach ($examTypes as $examType)
                                                <option value="{{ $examType->id }}"
                                                    {{ old('exam_type_id') == $examType->id ? 'selected' : '' }}>
                                                    {{ $examType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('exam_type_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="exam_year" class="form-label">Exam Year <span
                                                class="text-danger">*</span></label>
                                        <select name="exam_year" id="exam_year"
                                            class="form-control @error('exam_year') is-invalid @enderror" required>
                                            <option value="">-- Select Year --</option>
                                            @for ($year = date('Y'); $year >= 2000; $year--)
                                                <option value="{{ $year }}"
                                                    {{ old('exam_year') == $year ? 'selected' : '' }}>
                                                    {{ $year }}
                                                </option>
                                            @endfor
                                        </select>
                                        @error('exam_year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="class_id" class="form-label">Class <span
                                                class="text-danger">*</span></label>
                                        <select name="class_id" id="class_id"
                                            class="form-control @error('class_id') is-invalid @enderror" required>
                                            <option value="">-- Select Class --</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}"
                                                    {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                                    {{ $class->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="section_id" class="form-label">Section <span
                                                class="text-danger">*</span></label>
                                        <select name="section_id" id="section_id"
                                            class="form-control @error('section_id') is-invalid @enderror" required>
                                            <option value="">-- Select Section --</option>
                                        </select>
                                        @error('section_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="student_id" class="form-label">Student <span
                                            class="text-danger">*</span></label>
                                    <select name="student_id" id="student_id"
                                        class="form-control @error('student_id') is-invalid @enderror" required>
                                        <option value="">-- Select Student --</option>
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
                                                {{ old('grade') == $grade ? 'selected' : '' }}>{{ $grade }}</option>
                                        @endforeach
                                    </select>
                                    @error('grade')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="{{ route('admin.result.index') }}"
                                        class="btn btn-secondary btn-lg me-2 px-4">Cancel</a>
                                    <button type="submit" class="btn btn-success btn-lg px-4">Save Result</button>
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
    <script>
        document.getElementById('class_id').addEventListener('change', function() {
            let classId = this.value;
            let sectionDropdown = document.getElementById('section_id');
            let studentDropdown = document.getElementById('student_id');

            sectionDropdown.innerHTML = '<option value="">-- Select Section --</option>';
            studentDropdown.innerHTML = '<option value="">-- Select Student --</option>';

            if (classId) {
                fetch(`/admin/get-sections/${classId}`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(section => {
                            let opt = document.createElement('option');
                            opt.value = section.id;
                            opt.textContent = section.name;
                            sectionDropdown.appendChild(opt);
                        });
                    });
            }
        });

        document.getElementById('section_id').addEventListener('change', function() {
            let classId = document.getElementById('class_id').value;
            let sectionId = this.value;
            let studentDropdown = document.getElementById('student_id');

            studentDropdown.innerHTML = '<option value="">-- Select Student --</option>';

            if (classId && sectionId) {
                fetch(`/admin/get-students/${classId}/${sectionId}`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(student => {
                            let opt = document.createElement('option');
                            opt.value = student.id;
                            opt.textContent = `${student.name} (Roll ${student.roll})`;
                            studentDropdown.appendChild(opt);
                        });
                    });
            }
        });
    </script>
@endpush