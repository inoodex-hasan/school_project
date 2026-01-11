@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1>Edit Slide</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group
">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $slide->title) }}">
        </div>
        <div class="form-group">
            <label for="subtitle">Subtitle</label>
            <textarea class="form-control" id="subtitle" name="subtitle"
                rows="3">{{ old('subtitle', $slide->subtitle) }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @if ($slide->image)
            <img src="{{ asset('storage/' . $slide->image) }}" alt="Current Image" class="img-thumbnail mt-2"
                style="max-width: 200px;">
            @endif


        </div>
        <button type="submit" class="btn btn-primary">Update Slide</button>
        <a href="{{ route('admin.slides.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection