@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Account Type Management</h1>
            </div>
            <a href="{{ route('admin.account_types.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add Account Type
            </a>
        </div>

        {{-- Stats Overview --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Types</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $accountTypes->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Latest Added</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $accountTypes->sortByDesc('created_at')->first()->name ?? 'N/A' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content Table --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">All Account Types</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover align-middle" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0">Name</th>
                                <th class="border-0">Type</th>
                                <th class="border-0">Description</th>
                                <th class="border-0 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($accountTypes as $type)
                                <tr>
                                    <td class="font-weight-bold text-dark">{{ $type->name }}</td>
                                    <td>
                                        <span class="badge {{ $type->type === 'income' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($type->type) }}
                                        </span>
                                    </td>
                                    <td>{{ $type->description ?? '-' }}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.account_types.edit', $type->id) }}"
                                                class="btn btn-outline-warning btn-sm mx-1" title="Edit">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.account_types.destroy', $type->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this account type?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm mx-1">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <p>No account types found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection