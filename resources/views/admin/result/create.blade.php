@extends('admin.adminlayout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5>Add Result</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.result.store') }}" method="POST">
                @csrf


                <!-- Exam Type -->
                <div class="mb-3">
                    <label for="exam_type_id" class="form-label">Exam Type <span class="text-danger">*</span></label>
                    <select name="exam_type_id" class="form-select" required>
                        <option value="">-- Select Exam Type --</option>
                        @foreach($examTypes as $examType)
                        <option value="{{ $examType->id }}"
                            {{ old('exam_type_id') == $examType->id ? 'selected' : '' }}>
                            {{ $examType->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Exam Year -->
                <div class="mb-3">
                    <label for="exam_year">Exam Year</label>
                    <select name="exam_year" class="form-select" required>
                        <option value="">-- Select Year --</option>
                        @for($year = date('Y'); $year >= 2000; $year--)
                        <option value="{{ $year }}" {{ old('exam_year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                        @endfor
                    </select>
                </div>

                <!-- Class -->
                <div class="mb-3">
                    <label>Class</label>
                    <select name="class_id" id="class_id" class="form-select" required>
                        <option value="">-- Select Class --</option>
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Section -->
                <div class="mb-3">
                    <label>Section</label>
                    <select name="section_id" id="section_id" class="form-select" required>
                        <option value="">-- Select Section --</option>
                    </select>
                </div>

                <!-- Student -->
                <div class="mb-3">
                    <label>Student</label>
                    <select name="student_id" id="student_id" class="form-select" required>
                        <option value="">-- Select Student --</option>
                    </select>
                </div>

                <!-- Grade -->
                <div class="mb-3">
                    <label>Grade</label>
                    <select name="grade" class="form-select" required>
                        <option value="">-- Select Grade --</option>
                        <option value="A+">A+</option>
                        <option value="A">A</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B">B</option>
                        <option value="B-">B-</option>
                        <option value="C+">C+</option>
                        <option value="C">C</option>
                        <option value="C-">C-</option>
                        <option value="D">D</option>
                        <option value="F">F</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.result.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Save Result</button>
                </div>
            </form>
        </div>
    </div>
</div>
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