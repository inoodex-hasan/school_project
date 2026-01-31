@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Notice Management</h1>
            </div>
            <a href="{{ route('admin.notices.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Create New Notice
            </a>
        </div>

        {{-- Stats Overview (3 Packages Layout) --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Notices</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $notices->count() }}</div>
                    </div>
                </div>
            </div>
            {{-- Most Popular / Important Package in Middle --}}
            <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2 border-bottom-success"
                    style="transform: scale(1.05); z-index: 10;">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Notices</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $notices->where('status', 1)->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Draft/Inactive</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $notices->where('status', 0)->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content Table --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">All Notices</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0">Title</th>
                                <th class="border-0">Content</th>
                                <th class="border-0">Date Posted</th>
                                <th class="border-0 text-center">Status</th>
                                <th class="border-0 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($notices as $notice)
                                <tr>
                                    <td class="font-weight-bold text-dark">{{ $notice->title }}</td>
                                    <td>{{ $notice->content }}</td>
                                    <td>
                                        <span class="text-muted"><i class="far fa-calendar-alt mr-1"></i>
                                            {{ $notice->created_at?->format('d M Y') ?? 'N/A' }}</span>
                                    </td>
                                    <td class="text-center">
                                        @if ($notice->status)
                                            <span
                                                class="badge rounded-pill bg-light-success text-success px-3">Active</span>
                                        @else
                                            <span
                                                class="badge rounded-pill bg-light-danger text-danger px-3">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.notices.show', $notice->id) }}"
                                                class="btn btn-outline-primary btn-sm mx-1" title="View">
                                                View
                                            </a>
                                            <a href="{{ route('admin.notices.edit', $notice->id) }}"
                                                class="btn btn-outline-warning btn-sm mx-1" title="Edit">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.notices.destroy', $notice->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this notice?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-outline-danger btn-sm mx-1">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <p>No notices found.</p>
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
        /* Add these to your CSS file or a style tag */
        .bg-light-success {
            background-color: #e8fadf;
            border: 1px solid #c3e6cb;
        }

        .bg-light-danger {
            background-color: #fdf2f2;
            border: 1px solid #f5c6cb;
        }

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
