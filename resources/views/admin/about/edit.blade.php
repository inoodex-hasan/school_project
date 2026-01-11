@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit About</h1>

    <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $about->title) }}"
                required>
        </div>

        <!-- Content -->
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea name="content" id="editor" rows="6" class="form-control"
                required>{{ old('content', $about->content) }}</textarea>
        </div>

        <!-- Image -->
        <div class="form-group mb-4">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">

            @if($about->photo)
            <div class="mt-3">
                <img src="{{ asset('storage/'.$about->photo) }}" alt="Current Photo" width="100" height="100"
                    class="rounded shadow-sm">
            </div>
            @endif

            <!-- Submit -->
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('editor');
</script>
@endpush