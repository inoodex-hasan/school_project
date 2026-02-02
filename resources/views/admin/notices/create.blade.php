@extends('admin.adminlayout')
{{--
@section('title', 'Create New Blog Post') --}}

@section('content')
    <section class="section">
        {{-- <div class="section-header">
            <h1>Blog Posts</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.notices.index') }}">Blog</a></div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div> --}}

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Create New Notice</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.notices.index') }}"
                                    class="btn btn-primary px-4 rounded-2 shadow-sm">
                                    Back to List
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.notices.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Published
                                            </option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Draft</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea name="description" id="description" rows="10"
                                            class="summernote @error('description') is-invalid @enderror"
                                            required>{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-m">
                                        Publish Notice
                                    </button>
                                    <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary btn-m ml-2">
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
            $('#description').summernote({
                height: 200
            });
        });
    </script>
@endpush