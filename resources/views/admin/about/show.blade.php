@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center bg-white border-bottom">
                <h6 class="m-0 font-weight-bold text-primary">{{ $about->title }}</h6>
                <a href="{{ route('admin.about.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Back to List
                </a>
            </div>
            <div class="card-body">
                @if($about->photo)
                    <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . $about->photo) }}" alt="{{ $about->title }}"
                            class="img-fluid rounded shadow-sm" style="max-height: 400px; object-fit: cover;">
                    </div>
                @endif

                <div class="prose max-w-none">
                    {!! $about->content !!}
                </div>
            </div>
            <div class="card-footer bg-white border-top">
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </a>
                    <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash mr-1"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection