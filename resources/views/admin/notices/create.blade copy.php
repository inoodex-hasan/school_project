@extends('admin.adminlayout')

@section('content')
    <div class="container py-5" style="max-width: 900px;">

        <div class="mb-4">
            <h1 class="h4 fw-semibold mb-1">New Notice</h1>
            <p class="text-muted small mb-0">Fill in the details to publish a new announcement.</p>
        </div>

        <form action="{{ route('admin.notices.store') }}" method="POST" id="noticeForm">
            @csrf

            <div class="card border-0 shadow-sm mb-4" style="border-radius: 12px;">
                <div class="card-body p-4 p-md-5">

                    <div class="mb-4">
                        <label class="form-label small fw-medium text-secondary">Notice Title</label>
                        <input type="text" name="title" id="inputTitle"
                            class="form-control form-control-lg border-light-subtle @error('title') is-invalid @enderror"
                            placeholder="e.g. System Maintenance"
                            style="background-color: #fdfdfd; font-size: 1.1rem; border-radius: 8px;"
                            value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-medium text-secondary">Content</label>
                        <div class="editor-container">
                            <textarea id="editor" name="content">{{ old('content') }}</textarea>
                        </div>
                        <div id="editorError" class="text-danger small mt-2" style="display:none;">
                            <i class="fas fa-exclamation-circle me-1"></i> Content cannot be empty.
                        </div>
                    </div>

                    <div class="row align-items-center pt-4 border-top mt-5">
                        <div class="col-sm-4">
                            <div class="d-flex align-items-center">
                                <label class="small fw-medium text-secondary me-3">Visibility</label>
                                <select name="status"
                                    class="form-select form-select-sm w-auto border-0 bg-light fw-medium">
                                    <option value="1">Active</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-8 text-sm-end mt-3 mt-sm-0">
                            <a href="{{ route('admin.notices.index') }}"
                                class="btn btn-link text-decoration-none text-muted small fw-medium me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary px-4 py-2 fw-medium shadow-sm"
                                style="border-radius: 8px;">
                                Publish Notice
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.1/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f6f8fa;
            color: #333;
        }

        /* Modern Input Styling */
        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 4px rgba(13, 110, 253, 0.08);
            background-color: #fff;
        }

        /* Summernote Modern Visibility Fixes */
        .note-editor.note-frame {
            border: 1px solid #dee2e6 !important;
            border-radius: 10px !important;
            overflow: hidden !important;
            background: #fff;
        }

        .note-toolbar {
            background-color: #f8f9fa !important;
            border-bottom: 1px solid #eee !important;
            padding: 8px 12px !important;
        }

        /* Ensure Icons are visible and buttons look modern */
        .note-btn {
            background: #fff !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 4px !important;
            color: #475569 !important;
            margin-right: 4px !important;
            transition: all 0.2s ease;
        }

        .note-btn:hover {
            background-color: #f1f5f9 !important;
            color: #000 !important;
            border-color: #cbd5e1 !important;
        }

        .note-btn.active {
            background-color: #e2e8f0 !important;
            color: #0d6efd !important;
        }

        .note-editable {
            padding: 20px !important;
            font-size: 1rem;
            line-height: 1.6;
            min-height: 320px;
        }

        .note-statusbar {
            display: none;
        }

        /* Custom error styling for the editor */
        .editor-error-active {
            border: 1px solid #dc3545 !important;
            border-radius: 10px !important;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.1/dist/summernote-lite.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#editor').summernote({
                placeholder: 'Type your notice content here...',
                height: 350,
                tabsize: 2,
                dialogsInBody: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['codeview', 'fullscreen']]
                ]
            });

            // Form Validation
            $('#noticeForm').on('submit', function(e) {
                let isValid = true;
                const title = $('#inputTitle').val().trim();
                const contentCode = $('#editor').summernote('code');
                const textContent = $('<div>').html(contentCode).text().trim();

                // Title check
                if (title === "") {
                    $('#inputTitle').addClass('is-invalid');
                    isValid = false;
                }

                // Content check (text or image must exist)
                if (textContent === "" && !$(contentCode).find('img').length) {
                    $('#editorError').show();
                    $('.note-editor').addClass('editor-error-active');
                    isValid = false;
                }

                if (!isValid) {
                    e.preventDefault();
                    window.scrollTo(0, 0);
                }
            });

            // Clear errors on input
            $('#inputTitle').on('input', function() {
                $(this).removeClass('is-invalid');
            });
            $('#editor').on('summernote.change', function() {
                $('#editorError').hide();
                $('.note-editor').removeClass('editor-error-active');
            });
        });
    </script>
@endpush
