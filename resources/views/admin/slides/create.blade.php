@extends('admin.adminlayout')

@section('content')
<div class="container-fluid mt-5 px-4">
    <div class="card shadow-sm border-0 rounded-3 w-100">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Add Slides</h4>
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

                <div class="row g-3">
                    {{-- Slide Title --}}
                    <div class="col-12">
                        <label for="title" class="form-label">Slide Title</label>
                        <input type="text" name="title" id="title"
                            class="form-control form-control-lg @error('title') is-invalid @enderror"
                            placeholder="Enter slide title" value="{{ old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Subtitle --}}
                    <div class="col-12">
                        <label for="subtitle" class="form-label">Subtitle</label>
                        <input type="textarea" name="subtitle" id="subtitle"
                            class="form-control form-control-lg @error('subtitle') is-invalid @enderror"
                            placeholder="Enter subtitle" value="{{ old('subtitle') }}">
                        @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Slide Image --}}
                    <div class="col-12">
                        <label for="image" class="form-label">Slide Image</label>
                        <input type="file" name="image" id="image"
                            class="form-control form-control-lg @error('image') is-invalid @enderror" required>
                        @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Save Slide</button>
                    </div>
            </form>

        </div>
    </div>
</div>
@endsection



<!-- @push('styles')
<link rel="stylesheet" href="{{ asset('css/slides/create.css') }}">
@endpush -->