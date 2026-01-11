@extends('admin.adminlayout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Manage School Classes</h5>
            <a href="{{ route('admin.schoolclass.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Add New Class
            </a>
        </div>
        <div class="card-body">

            @if($classes->count() > 0)
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Class Name</th>
                            <!-- <th>Section</th> -->
                            <th>Created At</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classes as $class)
                        <tr>
                            <td>{{ $class->id }}</td>
                            <td>{{ $class->name }}</td>
                            <!-- <td>{{ $class->section ?? '-' }}</td> -->
                            <td>{{ $class->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.schoolclass.edit', $class->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                           <form action="{{ route('admin.schoolclass.destroy', $class->id) }}" 
                        method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this class?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $classes->links('pagination::bootstrap-5') }}
                </div>
            @else
                <p class="text-muted">No classes found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
