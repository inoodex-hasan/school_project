@extends('admin.adminlayout')


@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Exam Types</h2>
        <a href="{{ route('admin.exam_type.create') }}" class="btn btn-success">Add Exam Type</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($examTypes as $index => $examType)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $examType->name }}</td>
                        <td>{{ Str::limit($examType->description, 50, '...') }}</td>
                        <td>
                            @if($examType->status)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $examType->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.exam_type.edit', $examType->id) }}"
                                class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.exam_type.destroy', $examType->id) }}" method="POST"
                                class="d-inline-block"
                                onsubmit="return confirm('Are you sure to delete this exam type?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No exam types found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection