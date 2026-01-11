@extends('admin.adminlayout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            {{-- Title --}}
            <h2 class="card-title mb-3">{{ $notice->title }}</h2>

            {{-- Meta --}}
            <div class="mb-3">
                <small class="text-muted">Posted on {{ $notice->created_at->format('d M Y') }}</small>
                @if($notice->status)
                    <span class="badge badge-success ms-2">Active</span>
                @else
                    <span class="badge badge-danger ms-2">Inactive</span>
                @endif
            </div>

            {{-- Content --}}
            <div class="card-text mb-4">
                {!! $notice->content !!}
            </div>

            {{-- Actions (always visible) --}}
            <div class="d-flex">
                <a href="{{ route('admin.notices.edit', $notice->id) }}" class="btn btn-warning mr-2">Edit</a>
                <form action="{{ route('admin.notices.destroy', $notice->id) }}" method="POST" 
                      onsubmit="return confirm('Are you sure you want to delete this notice?');">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



<!-- @push('styles')
<link rel="stylesheet" href="{{ asset('css/notice/show.css') }}">
@endpush -->

