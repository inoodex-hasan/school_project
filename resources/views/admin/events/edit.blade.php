@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Event</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.events.index') }}"
                                    class="btn btn-primary px-4 rounded-2 shadow-sm">
                                    <i class="fas fa-arrow-left mr-1"></i> Back to List
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('admin.events.update', $event->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    {{-- Title --}}
                                    <div class="col-md-8 mb-3">
                                        <label for="title" class="form-label">Event Title <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ old('title', $event->title) }}" required>
                                    </div>

                                    {{-- Date --}}
                                    <div class="col-md-4 mb-3">
                                        <label for="event_date" class="form-label">Event Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="event_date" id="event_date" class="form-control"
                                            value="{{ old('event_date', $event->event_date) }}" required>
                                    </div>

                                    {{-- Description --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="description" class="form-label">Description <span
                                                class="text-danger">*</span></label>
                                        <textarea name="description" id="summernote" class="form-control"
                                            required>{{ old('description', $event->description) }}</textarea>
                                    </div>

                                    {{-- Photo --}}
                                    <div class="col-md-12 mb-3">
                                        <label for="photo" class="form-label">Event Photo</label>
                                        <div class="d-flex align-items-center">
                                            @if ($event->photo)
                                                <img src="{{ asset('storage/' . $event->photo) }}" alt="Event Photo"
                                                    class="rounded mr-3 border" width="60" height="60"
                                                    style="object-fit: cover;">
                                            @endif
                                            <div class="custom-file">
                                                <input type="file" name="photo" id="photo" class="custom-file-input"
                                                    accept="image/*">
                                                <label class="custom-file-label" for="photo">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg shadow-sm px-5">
                                        <i class="fas fa-save mr-2"></i> Update Event
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#summernote').summernote({
                    placeholder: 'Write event description here...',
                    tabsize: 2,
                    height: 300,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });

                // Custom file input label update
                $(".custom-file-input").on("change", function () {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            });
        </script>
    @endpush
@endsection