@extends('admin.adminlayout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Manage Subjects</h5>
            <a href="{{ route('admin.subject.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Add Subject
            </a>
        </div>
        <div class="card-body">

            @if($subjects->count())
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Subject Name</th>
                            <th>Class</th>
                            <th>Created At</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $subject)
                        <tr>
                            <td>{{ $subject->id }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->schoolClass->name ?? '-' }}</td>
                            <td>{{ $subject->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.subject.edit', $subject->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.subject.destroy', $subject->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this subject?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $subjects->links('pagination::bootstrap-5') }}
                </div>
            @else
                <p class="text-muted">No subjects found. <a href="{{ route('admin.subject.create') }}">Add one now</a>.</p>
            @endif
        </div>
    </div>
</div>
@endsection
