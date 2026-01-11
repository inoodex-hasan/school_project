@extends('admin.adminlayout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Manage Results</h2>

    <!-- Filter Form -->
    <select name="exam_type" onchange="this.form.submit()">
        <option value="">All Types</option>
        @foreach(['Midterm','Final','Test','Class Test'] as $type)
        <option value="{{ $type }}" {{ request('exam_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
        @endforeach
    </select>

    <select name="exam_year" onchange="this.form.submit()">
        <option value="">All Years</option>
        @for($year = date('Y'); $year >= 2000; $year--)
        <option value="{{ $year }}" {{ request('exam_year') == $year ? 'selected' : '' }}>{{ $year }}</option>
        @endfor
    </select>

    <form action="{{ route('admin.result.index') }}" method="GET" id="filterForm" class="row mb-4 g-2">
        <div class="col-md-4">
            <label for="class_id" class="form-label">Select Class</label>
            <select name="class_id" id="class_id" class="form-select">
                <option value="">-- Choose Class --</option>
                @foreach($classes as $class)
                <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                    {{ $class->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="section" class="form-label">Select Section</label>
            <select name="section_id" id="section_id" class="form-select">
                <option value="">-- Choose Section --</option>
            </select>

        </div>

        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-secondary w-100">Filter</button>
        </div>

    </form>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Results</h2>
        <a href="{{ route('admin.result.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Result
        </a>
    </div>

    <!-- Results Table -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered table-striped mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Roll</th>
                        <th>Exam</th>
                        <th>Grade</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($results as $result)
                    <tr>
                        <td>{{ $result->id }}</td>
                        <td>{{ $result->student->name ?? 'N/A' }}</td>
                        <td>{{ $result->student->class->name ?? 'N/A' }}</td>
                        <td>{{ $result->student->section->name ?? 'N/A' }}</td>
                        <td>{{ $result->student->roll ?? 'N/A' }}</td>
                        <td>{{ $result->examType->name ?? 'N/A' }}</td>
                        <td>{{ $result->grade ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('admin.result.edit', $result->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.result.destroy', $result->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Delete this result?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No results found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $results->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

@push('scripts')
<script>
document.getElementById('class_id').addEventListener('change', function() {
    let classId = this.value;
    let sectionDropdown = document.getElementById('section_id'); // matches the select
    sectionDropdown.innerHTML = '<option value="">-- Choose Section --</option>';

    if (classId) {
        fetch(`/admin/get-sections/${classId}`)
            .then(res => res.json())
            .then(data => {
                data.forEach(section => {
                    let option = document.createElement('option');
                    option.value = section.id;
                    option.textContent = section.name; // prevents raw JSON
                    sectionDropdown.appendChild(option);
                });
            })
            .catch(err => console.error(err));
    }
});
</script>

@endpush