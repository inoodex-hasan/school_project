@extends('admin.adminlayout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Create About Page</h1>

    <!-- Form -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">About Title</label>
                    <input type="text" name="title" id="title" 
                           class="form-control" 
                           value="{{ old('title') }}" 
                           placeholder="Enter about title" required>
                </div>

                <!-- Content -->
                <div class="mb-3">
                    <label for="content" class="form-label">About Content</label>
                    <textarea name="content" id="content" rows="6" 
                              class="form-control" 
                              placeholder="Write your about content here...">{{ old('content') }}</textarea>
                </div>

                <!-- Photo -->
                <div class="mb-3">
                    <label for="photo" class="form-label">Upload Photo</label>
                    <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Allowed: JPG, JPEG, PNG | Max size: 2MB</small>
                </div>

                <!-- Submit -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Create About Page</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endpush

