@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Messages Management</h1>
            </div>
            <a href="{{ route('admin.messages.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add Message
            </a>
        </div>

        {{-- Stats Overview --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Messages</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $messages->count() }}</div>
                    </div>
                </div>
            </div>
            {{-- Placeholder Stats --}}
            <div class="col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Principals</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $messages->where('type', 'Principal')->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Recent</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $messages->where('created_at', '>=', now()->subDays(7))->count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content Table --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">All Messages</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0">Title</th>
                                <th class="border-0">Designation</th>
                                <th class="border-0">Photo</th>
                                <th class="border-0">Published At</th>
                                <th class="border-0 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $key => $message)
                                <tr>
                                    <td class="font-weight-bold text-dark">{{ $message->title }}</td>
                                    <td><span
                                            class="badge bg-light text-dark border">{{ ucfirst(str_replace('-', ' ', $message->type)) }}</span>
                                    </td>
                                    <td>
                                        @if($message->photo)
                                            <img src="{{ asset('storage/' . $message->photo) }}" width="40" height="40"
                                                class="rounded-circle border" style="object-fit: cover;">
                                        @else
                                            <span class="text-muted small">No photo</span>
                                        @endif
                                    </td>
                                    <td>{{ $message->created_at->format('d M, Y') }}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.messages.show', $message->id) }}"
                                                class="btn btn-outline-info btn-sm mx-1" title="View">
                                                View
                                            </a>
                                            <a href="{{ route('admin.messages.edit', $message->id) }}"
                                                class="btn btn-outline-warning btn-sm mx-1" title="Edit">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Delete this message?');">
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
                                        <p>No messages found.</p>
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