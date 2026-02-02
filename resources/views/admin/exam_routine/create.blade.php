@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm border-0">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Upload Exam Routine</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.exam_routine.index') }}"
                                    class="btn btn-outline-primary px-4 rounded-2">
                                    <i class="fas fa-arrow-left me-2"></i> Back
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

                            <form action="{{ route('admin.exam_routine.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">Routine Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="e.g., Final Exam 2024" value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="file" class="form-label">Upload PDF File <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="file" id="file"
                                        class="form-control @error('file') is-invalid @enderror" accept="application/pdf"
                                        required>
                                    <small class="form-text text-muted">Only PDF files are allowed (Max: 2MB)</small>
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="{{ route('admin.exam_routine.index') }}"
                                        class="btn btn-secondary btn-lg me-2 px-4">Cancel</a>
                                    <button type="submit" class="btn btn-primary btn-lg px-4">
                                        <i class="fas fa-upload mr-2"></i> Upload Routine
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection