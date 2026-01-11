@extends('admin.adminlayout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">About Page</h1>

    <!-- Add New Button -->
    <a href="{{ route('admin.about.create') }}" class="btn btn-primary mb-3">Add New</a>

    <!-- Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Photo</th>
                        <th width="220">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($abouts as $about)
                    <tr>
                        <td>{{ $about->title ?? 'No Title' }}</td>
                        <td>{{ Str::limit(strip_tags($about->content ?? ''), 60) }}</td>
                        <td>
                            @if($about->photo)
                            <img src="{{ asset('storage/' . $about->photo) }}" alt="About photo" width="80">
                            @else
                            <img src="{{ asset('images/default.png') }}" alt="Default photo" width="80">
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.about.show', $about->id) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('admin.about.edit', $about->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST"
                                class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this entry?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No entries found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection