@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Class Management</h1>
            </div>
            <a href="{{ route('admin.schoolclass.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add New Class
            </a>
        </div>

        {{-- Stats Overview --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Classes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $classes->total() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2 border-bottom-success"
                    style="transform: scale(1.05); z-index: 10;">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Classes</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $classes->total() }}</div>
                    </div>
                </div>
            </div>
            {{-- Placeholder for 3rd stat --}}
            <div class="col-md-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Archive</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content Table --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">All School Classes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0">Class Name</th>
                                <th class="border-0">Created At</th>
                                <th class="border-0 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($classes as $class)
                                <tr>
                                    <td class="font-weight-bold text-dark">{{ $class->name }}</td>
                                    <td>{{ $class->created_at->format('d M Y') }}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.schoolclass.edit', $class->id) }}"
                                                class="btn btn-outline-warning btn-sm mx-1" title="Edit">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.schoolclass.destroy', $class->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this class?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm mx-1">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-5 text-muted">
                                        <p>No classes found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="mt-4 d-flex justify-content-end">
                    {{ $classes->links('pagination::bootstrap-5') }}
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