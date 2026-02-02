@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-11">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Student Results Management</h1>
            </div>
            <a href="{{ route('admin.result.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add Result
            </a>
        </div>

        {{-- Filter Card --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Filter Results</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.result.index') }}" method="GET" id="filterForm">
                    <div class="row">
                        <div class="col-md-3 form-group mb-3">
                            <label for="class_id" class="form-label">Class</label>
                            <select name="class_id" id="class_id" class="form-control">
                                <option value="">-- All Classes --</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group mb-3">
                            <label for="section_id" class="form-label">Section</label>
                            <select name="section_id" id="section_id" class="form-control">
                                <option value="">-- All Sections --</option>
                            </select>
                        </div>

                        <div class="col-md-3 form-group mb-3">
                            <label for="exam_type" class="form-label">Exam Type</label>
                            <select name="exam_type" id="exam_type" class="form-control">
                                <option value="">-- All Types --</option>
                                @foreach (['Midterm', 'Final', 'Test', 'Class Test'] as $type)
                                    <option value="{{ $type }}" {{ request('exam_type') == $type ? 'selected' : '' }}>{{ $type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 form-group mb-3">
                            <label for="exam_year" class="form-label">Exam Year</label>
                            <select name="exam_year" id="exam_year" class="form-control">
                                <option value="">-- All Years --</option>
                                @for ($year = date('Y'); $year >= 2000; $year--)
                                    <option value="{{ $year }}" {{ request('exam_year') == $year ? 'selected' : '' }}>{{ $year }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fas fa-filter mr-2"></i> Apply Filters
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Results Table Card --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Student Results</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 50px;">ID</th>
                                <th>Student</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Roll</th>
                                <th>Exam</th>
                                <th>Grade</th>
                                <th class="text-center" style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results as $result)
                                <tr>
                                    <td class="align-middle">{{ $result->id }}</td>
                                    <td class="align-middle font-weight-bold">{{ $result->student->name ?? 'N/A' }}</td>
                                    <td class="align-middle">{{ $result->student->class->name ?? 'N/A' }}</td>
                                    <td class="align-middle">{{ $result->student->section->name ?? 'N/A' }}</td>
                                    <td class="align-middle">{{ $result->student->roll ?? 'N/A' }}</td>
                                    <td class="align-middle">{{ $result->examType->name ?? 'N/A' }}</td>
                                    <td class="align-middle">
                                        <span
                                            class="badge badge-{{ $result->grade == 'A+' || $result->grade == 'A' ? 'success' : ($result->grade == 'F' ? 'danger' : 'info') }}">
                                            {{ $result->grade ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.result.edit', $result->id) }}"
                                                class="btn btn-outline-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.result.destroy', $result->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Delete this result?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        No results found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($results->hasPages())
                    <div class="mt-3">
                        {{ $results->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('class_id').addEventListener('change', function () {
            let classId = this.value;
            let sectionDropdown = document.getElementById('section_id');
            sectionDropdown.innerHTML = '<option value="">-- All Sections --</option>';

            if (classId) {
                fetch(`/admin/get-sections/${classId}`)
                    .then(res => res.json())
                    .then(data => {
                        data.forEach(section => {
                            let option = document.createElement('option');
                            option.value = section.id;
                            option.textContent = section.name;
                            sectionDropdown.appendChild(option);
                        });
                    })
                    .catch(err => console.error(err));
            }
        });
    </script>
@endpush