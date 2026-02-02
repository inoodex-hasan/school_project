@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit About Page: {{ $about->title }}</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.about.index') }}" class="btn btn-primary px-4 rounded-2 shadow-sm">
                                    Back to List
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.about.update', $about->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>About Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $about->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>About Content <span class="text-danger">*</span></label>
                                        <textarea name="content" id="content" rows="10"
                                            class="summernote @error('content') is-invalid @enderror"
                                            required>{!! old('content', $about->content) !!}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Upload Photo</label>
                                        <input type="file" name="photo"
                                            class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                                        <small class="form-text text-muted">Leave empty to keep current photo. Recommended
                                            size: 1920x600px</small>
                                        @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        @if($about->photo)
                                            <div class="mt-3">
                                                <label>Current Photo:</label>
                                                <div class="p-2 border rounded d-inline-block bg-light">
                                                    <img src="{{ asset('storage/' . $about->photo) }}" alt="Current Photo"
                                                        class="img-fluid rounded" style="max-height: 150px;">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">
                                        Update Page
                                    </button>
                                    <a href="{{ route('admin.about.index') }}" class="btn btn-secondary btn-lg ml-2 px-4">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#content').summernote({
                height: 200
            });
        });
    </script>
@endpush