@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Gallery Item</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.gallery.index') }}"
                                    class="btn btn-primary px-4 rounded-2 shadow-sm">
                                    Back to Gallery
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $item->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12 mb-4">
                                        <label class="d-block mb-2">Current Preview</label>
                                        <div class="p-3 bg-light border rounded text-center">
                                            @if ($item->type === 'photo')
                                                <img src="{{ asset('storage/' . $item->path) }}" alt="{{ $item->title }}"
                                                    class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                                            @elseif($item->type === 'video')
                                                <video controls class="w-100" style="max-height: 300px; max-width: 500px;">
                                                    <source src="{{ asset('storage/' . $item->path) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="file">Change File (optional)</label>
                                        <div class="custom-file">
                                            <input type="file" name="file" id="file"
                                                class="custom-file-input @error('file') is-invalid @enderror"
                                                accept="{{ $item->type === 'photo' ? 'image/*' : 'video/*' }}">
                                            <label class="custom-file-label" for="file">Choose file</label>
                                        </div>
                                        <small class="form-text text-muted mt-2">
                                            Leave blank to keep the current {{ $item->type }}.
                                        </small>
                                        @error('file')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">Update Item</button>
                                    <a href="{{ route('admin.gallery.index') }}"
                                        class="btn btn-secondary btn-lg ml-2 px-4">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            // Custom file input label update
            $(".custom-file-input").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
    @endpush
@endsection