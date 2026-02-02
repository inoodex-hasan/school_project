@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Exam Type Management</h1>
            </div>
            <a href="{{ route('admin.exam_type.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add Exam Type
            </a>
        </div>

        {{-- Stats Overview --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Exam Types</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $examTypes->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2 border-bottom-success"
                    style="transform: scale(1.05); z-index: 10;">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Exam Types</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $examTypes->where('status', 1)->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Inactive</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $examTypes->where('status', 0)->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content Table --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">All Exam Types</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0">Name</th>
                                <th class="border-0">Description</th>
                                <th class="border-0">Status</th>
                                <th class="border-0">Created At</th>
                                <th class="border-0 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($examTypes as $examType)
                                <tr>
                                    <td class="font-weight-bold text-dark">{{ $examType->name }}</td>
                                    <td>{{ Str::limit($examType->description, 50, '...') }}</td>
                                    <td>
                                        @if($examType->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-secondary">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $examType->created_at->format('d M Y') }}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.exam_type.edit', $examType->id) }}"
                                                class="btn btn-outline-warning btn-sm mx-1" title="Edit">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.exam_type.destroy', $examType->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this exam type?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm mx-1">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <p>No exam types found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table thead th {
            font-size: 0.85rem;
            letter-spacing: 0.05em;
            color: #6e707e;
        }

        .card {
            transition: all 0.2s ease-in-out;
        }
    </style>
@endsection