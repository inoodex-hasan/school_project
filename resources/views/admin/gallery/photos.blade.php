
@extends('admin.adminlayout')

@section('content')
    <div class="gallery-container">
    <h1>Add New Photo</h1>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Upload form --}}
<form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="type" value="photo">

    <div class="mb-3">
        <label for="title" class="form-label">Photo Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="file" class="form-label">Upload Photo</label>
        <input type="file" name="file" class="form-control" accept="image/*" required>
    </div>

    <button type="submit" class="btn btn-primary">Save Photo</button>
</form>


</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/gallery/photo.css') }}">
@endpush
