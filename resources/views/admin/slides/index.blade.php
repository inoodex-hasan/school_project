@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Slider Management</h1>
            </div>
            <a href="{{ route('admin.slides.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add New Slide
            </a>
        </div>

        {{-- Stats Overview --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-left-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Total Slides</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $slides->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2 border-bottom-success"
                    style="transform: scale(1.05); z-index: 10;">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Slides</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $slides->count() }}</div> {{-- Assuming all
                        are active for now or filtering if status exists --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Inactive</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">0</div> {{-- Placeholder as no status column
                        visible yet --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content Table --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white">
                <h6 class="m-0 font-weight-bold text-primary">All Slides</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0">Image</th>
                                <th class="border-0">Title</th>
                                <th class="border-0">Subtitle</th>
                                <th class="border-0 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($slides as $slide)
                                <tr>
                                    <td>
                                        <img src="{{ asset('storage/' . $slide->image) }}" alt="slide" class="rounded shadow-sm"
                                            width="100" height="60" style="object-fit: cover;">
                                    </td>
                                    <td class="font-weight-bold text-dark">{{ $slide->title }}</td>
                                    <td>{{ $slide->subtitle }}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.slides.edit', $slide->id) }}"
                                                class="btn btn-outline-warning btn-sm mx-1" title="Edit">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this slide?');">
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
                                        <p>No slides found.</p>
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