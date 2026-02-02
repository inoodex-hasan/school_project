@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Add New Slide</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.slides.index') }}"
                                    class="btn btn-primary px-4 rounded-2 shadow-sm">
                                    Back to List
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

                            <form action="{{ route('admin.slides.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    {{-- Slide Title --}}
                                    <div class="form-group col-md-6">
                                        <label for="title">Slide Title</label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter slide title" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Subtitle --}}
                                    <div class="form-group col-md-6">
                                        <label for="subtitle">Subtitle</label>
                                        <input type="text" name="subtitle" id="subtitle"
                                            class="form-control @error('subtitle') is-invalid @enderror"
                                            placeholder="Enter subtitle" value="{{ old('subtitle') }}">
                                        @error('subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Slide Image --}}
                                    <div class="form-group col-md-12">
                                        <label for="image">Slide Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image" id="image"
                                            class="form-control @error('image') is-invalid @enderror" required>
                                        <!-- <small class="form-text text-muted">Recommended size: 1920x600px</small> -->
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">Save Slide</button>
                                    <a href="{{ route('admin.slides.index') }}"
                                        class="btn btn-secondary btn-lg ml-2 px-4">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection