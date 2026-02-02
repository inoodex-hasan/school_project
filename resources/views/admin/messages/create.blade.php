@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Create New Message</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.messages.index') }}" class="btn btn-primary px-4 rounded-2 shadow-sm">
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

                            <form action="{{ route('admin.messages.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Message Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Enter message title" value="{{ old('title') }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="editor">Message Content <span class="text-danger">*</span></label>
                                        <textarea id="editor" name="content" rows="6"
                                            class="summernote @error('content') is-invalid @enderror" required>{{ old('content') }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="type">Designation <span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                            <option value="">-- Select Designation --</option>
                                            <option value="Principal" {{ old('type') == 'Principal' ? 'selected' : '' }}>
                                                Principal</option>
                                            <option value="Vice Principal"
                                                {{ old('type') == 'Vice Principal' ? 'selected' : '' }}>Vice Principal
                                            </option>
                                            <option value="Head Master"
                                                {{ old('type') == 'Head Master' ? 'selected' : '' }}>Head Master
                                            </option>
                                            <option value="Head Mistress"
                                                {{ old('type') == 'Head Mistress' ? 'selected' : '' }}>Head Mistress
                                            </option>
                                            <option value="Director" {{ old('type') == 'Director' ? 'selected' : '' }}>
                                                Director</option>
                                            <option value="Managing Director"
                                                {{ old('type') == 'Managing Director' ? 'selected' : '' }}>Managing
                                                Director</option>
                                            <option value="Chairman" {{ old('type') == 'Chairman' ? 'selected' : '' }}>
                                                Chairman</option>
                                            <option value="Co-Chairman"
                                                {{ old('type') == 'Co-Chairman' ? 'selected' : '' }}>Co Chairman</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="photo">Upload Photo</label>
                                        <input type="file" name="photo" id="photo"
                                            class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                                        @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">Publish</button>
                                    <a href="{{ route('admin.messages.index') }}"
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                height: 200
            });
        });
    </script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/message/create.css') }}">
@endpush