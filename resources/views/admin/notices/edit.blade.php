@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Notice: {{ $notice->title }}</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.notices.index') }}"
                                    class="btn btn-primary px-4 rounded-2 shadow-sm">
                                    Back to List
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.notices.update', $notice->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">

                                    {{-- Title --}}
                                    <div class="form-group col-md-6">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $notice->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', $notice->status) == 1 ? 'selected' : '' }}>
                                                Published
                                            </option>
                                            <option value="0" {{ old('status', $notice->status) == 0 ? 'selected' : '' }}>
                                                Draft
                                            </option>
                                        </select>
                                    </div>

                                    {{-- Content --}}
                                    <div class="form-group col-md-12">
                                        <label>Content <span class="text-danger">*</span></label>

                                        <textarea name="content" id="content" rows="10"
                                            class="summernote @error('content') is-invalid @enderror"
                                            required>{!! old('content', $notice->content) !!}</textarea>

                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Notice
                                    </button>
                                    <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary ml-2">
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