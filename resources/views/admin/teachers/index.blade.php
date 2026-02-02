@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-12">
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between align-items-center bg-white border-bottom">
                        <h6 class="m-0 font-weight-bold text-primary">Manage Teachers</h6>
                        <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary btn-sm shadow-sm">
                            <i class="fas fa-plus fa-sm text-white-50 mr-2"></i>Add New Teacher
                        </a>
                    </div>
                    <div class="card-body">
                        {{-- Filter Section --}}
                        <form method="GET" action="{{ route('admin.teachers.index') }}" class="mb-4">
                            <div class="form-row align-items-end">
                                <div class="col-md-4 mb-3">
                                    <label for="search" class="sr-only">Search</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                                        </div>
                                        <input type="text" class="form-control" name="search" id="search"
                                            value="{{ request('search') }}" placeholder="Search by name or email...">
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <select name="subject_id" class="form-control">
                                        <option value="">All Subjects</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}"
                                                {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <select name="status" class="form-control">
                                        <option value="">All Status</option>
                                        <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active
                                        </option>
                                        <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
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
                                        <th style="width: 20%">Name</th>
                                        <th style="width: 15%">Subject</th>
                                        <th style="width: 20%">Email</th>
                                        <th style="width: 15%">Phone</th>
                                        <th style="width: 5%">Status</th>
                                        <th style="width: 10%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $teacher->id }}</td>
                                            <td>
                                                @if ($teacher->photo)
                                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Photo"
                                                        class="rounded-circle border" width="40" height="40"
                                                        style="object-fit: cover;">
                                                @else
                                                    <div class="rounded-circle border d-flex align-items-center justify-content-center bg-light text-muted"
                                                        style="width: 40px; height: 40px;">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td class="font-weight-bold text-dark">{{ $teacher->name }}</td>
                                            <td><span class="badge badge-info">{{ $teacher->subject->name ?? 'N/A' }}</span>
                                            </td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->phone }}</td>
                                            <td>
                                                @if ($teacher->status)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-secondary">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admin.teachers.edit', $teacher->id) }}"
                                                        class="btn btn-warning btn-sm btn-circle mr-2" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.teachers.destroy', $teacher->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure you want to delete this teacher?');">
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
                                            <td colspan="8" class="text-center py-4 text-muted">No teachers found matching
                                                your criteria.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination (if available) --}}
                        <div class="d-flex justify-content-end mt-3">
                            {{-- {!! $teachers->links() !!} --}}
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