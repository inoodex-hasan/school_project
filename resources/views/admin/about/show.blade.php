@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $about->title }}</h1>

    <!-- Photo -->
    @if($about->photo)
        <div class="mb-3">
            <img src="{{ asset('storage/'.$about->photo) }}" 
                 alt="{{ $about->title }}" 
                 class="img-fluid rounded shadow" 
                 style="max-width: 400px;">
        </div>
    @endif

    <!-- Content -->
    <div class="card mb-4">
        <div class="card-body">
            {!! $about->content !!}
        </div>
    </div>

    <!-- Actions -->
    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Back</a>
    <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning">Edit</a>

    <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" onclick="return confirm('Delete this about entry?')">Delete</button>
    </form>
</div>
@endsection
