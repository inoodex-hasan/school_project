@extends('admin.adminlayout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Manage Sections</h5>
            <a href="{{ route('admin.section.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Add New Section
            </a>
        </div>
        <div class="card-body">

            @if($sections->count())
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Section Name</th>
                            <th>Class</th>
                            <th>Created At</th>
                            <th width="180">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $section)
                        <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->name }}</td>
                            <td>{{ $section->schoolClass->name ?? '-' }}</td>
                            <td>{{ $section->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('admin.section.edit', $section->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('admin.section.destroy', $section->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to delete this section?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted">No sections found.</p>
            @endif
        </div>
    </div>
</div>
@endsection
