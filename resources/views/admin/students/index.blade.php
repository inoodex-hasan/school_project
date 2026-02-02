@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-12">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-white border-bottom">
                        <h6 class="m-0 font-weight-bold text-primary">Manage Students</h6>
                        <a href="{{ route('admin.students.create') }}" class="btn btn-primary btn-sm shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Add New Student
                        </a>
                    </div>
                    <div class="card-body">
                        {{-- Filter Section --}}
                        <form method="GET" action="{{ route('admin.students.index') }}" class="mb-4">
                            <div class="form-row align-items-end">
                                <div class="col-md-5 mb-3">
                                    <label for="search" class="sr-only">Search</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="search" id="search"
                                            value="{{ request('search') }}" placeholder="Search by name or roll...">
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <select name="class_id" class="form-control">
                                        <option value="">All Classes</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}"
                                                {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                                {{ $class->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="d-flex">
                                        <button type="submit" class="btn btn-primary flex-grow-1 mr-2">Filter</button>
                                        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Reset</a>
                                    </div>
                                </div>
                            </div>
                        </form>

                        {{-- Table Section --}}
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover" id="dataTable" width="100%"
                                cellspacing="0">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="width: 5%">ID</th>
                                        <th style="width: 10%">Photo</th>
                                        <th style="width: 25%">Name</th>
                                        <th style="width: 15%">Class</th>
                                        <th style="width: 15%">Section</th>
                                        <th style="width: 10%">Roll</th>
                                        <th style="width: 15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td>{{ $student->id }}</td>
                                            <td>
                                                @if ($student->photo)
                                                    <img src="{{ asset('storage/' . $student->photo) }}" alt="Photo"
                                                        class="rounded-circle border" width="40" height="40"
                                                        style="object-fit: cover;">
                                                @else
                                                    <div class="rounded-circle border d-flex align-items-center justify-content-center bg-light text-muted"
                                                        style="width: 40px; height: 40px;">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="font-weight-bold text-dark">{{ $student->name }}</td>
                                            <td><span class="badge badge-info">{{ $student->class->name ?? 'N/A' }}</span>
                                            </td>
                                            <td><span
                                                    class="badge badge-secondary">{{ $student->section->name ?? 'N/A' }}</span>
                                            </td>
                                            <td>{{ $student->roll }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admin.students.edit', $student->id) }}"
                                                        class="btn btn-warning btn-sm btn-circle mr-2" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.students.destroy', $student->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this student?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm btn-circle"
                                                            title="Delete">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-4 text-muted">No students found matching
                                                your criteria.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination (if available) --}}
                        <div class="d-flex justify-content-end mt-3">
                            {{-- {!! $students->links() !!} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 6px 0px;
            border-radius: 15px;
            text-align: center;
            font-size: 12px;
            line-height: 1.42857;
        }
    </style>
@endsection