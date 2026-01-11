@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1 class="mb-4">Messages</h1>

    <!-- Add New Button -->
    <a href="{{ route('admin.messages.create') }}" class="btn btn-primary mb-3">+ Add New Message</a>

    <!-- Messages Table -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Designation</th>
                        <th>Photo</th>
                        <th>Published At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $key => $message)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $message->title }}</td>
                            <td>{{ ucfirst(str_replace('-', ' ', $message->type)) }}</td>
                            <td>
                                @if($message->photo)
                                    <img src="{{ asset('storage/'.$message->photo) }}" width="60" height="60" class="rounded">
                                @else
                                    <span class="text-muted">No photo</span>
                                @endif
                            </td>
                            <td>{{ $message->created_at->format('d M, Y') }}</td>
                            <td>
                                <a href="{{ route('admin.messages.show', $message->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('admin.messages.edit', $message->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" style="display:inline;">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this message?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No messages found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
