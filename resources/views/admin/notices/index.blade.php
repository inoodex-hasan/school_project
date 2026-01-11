@extends('admin.adminlayout')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Manage Notices</h1>
    <a href="{{ route('admin.notices.create') }}" class="btn btn-success mb-4">Create New Notice</a>

    {{-- Notices List --}}

    @forelse($notices as $notice)
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            {{-- Title --}}
            <h5 class="card-title">{{ $notice->title }}</h5>

            {{-- Content --}}
            <p class="card-text">{!! $notice->content !!}</p>

            {{-- Meta --}}
            <small class="text-muted">
                Posted on {{ $notice->created_at?->format('d M Y') ?? 'N/A' }}
            </small>

            {{-- Status --}}
            <div class="mt-2">
                @if($notice->status)
                <span class="badge bg-success">Active</span>
                @else
                <span class="badge bg-danger">Inactive</span>
                @endif
            </div>

            {{-- Actions with always-visible background --}}
            <div class="mt-3 d-flex">
                <a href="{{ route('admin.notices.show', $notice->id) }}" class="btn btn-primary btn-sm mr-2">View</a>
                <a href="{{ route('admin.notices.edit', $notice->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                <form action="{{ route('admin.notices.destroy', $notice->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this notice?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <p class="text-center text-muted">No notices found.</p>
    @endforelse
</div>
@endsection





<!-- @push('styles')
<link rel="stylesheet" href="{{ asset('css/notice/index.css') }}">
@endpush -->