@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Message: {{ $message->title }}</h4>
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

                            <form action="{{ route('admin.messages.update', $message->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="title">Message Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $message->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="editor">Message Content <span class="text-danger">*</span></label>
                                        <textarea id="editor" name="content" rows="6"
                                            class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $message->content) }}</textarea>
                                        @error('content')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="type">Designation <span class="text-danger">*</span></label>
                                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                            <option value="">-- Select Designation --</option>
                                            <option value="Principal" {{ old('type', $message->type) == 'Principal' ? 'selected' : '' }}>
                                                Principal</option>
                                            <option value="Vice Principal"
                                                {{ old('type', $message->type) == 'Vice Principal' ? 'selected' : '' }}>Vice Principal
                                            </option>
                                            <option value="Head Master"
                                                {{ old('type', $message->type) == 'Head Master' ? 'selected' : '' }}>Head Master
                                            </option>
                                            <option value="Head Mistress"
                                                {{ old('type', $message->type) == 'Head Mistress' ? 'selected' : '' }}>Head Mistress
                                            </option>
                                            <option value="Director" {{ old('type', $message->type) == 'Director' ? 'selected' : '' }}>
                                                Director</option>
                                            <option value="Managing Director"
                                                {{ old('type', $message->type) == 'Managing Director' ? 'selected' : '' }}>Managing
                                                Director</option>
                                            <option value="Chairman" {{ old('type', $message->type) == 'Chairman' ? 'selected' : '' }}>
                                                Chairman</option>
                                            <option value="Co-Chairman"
                                                {{ old('type', $message->type) == 'Co-Chairman' ? 'selected' : '' }}>Co Chairman</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="photo">Upload New Photo</label>
                                        <input type="file" name="photo" id="photo"
                                            class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                                        @if ($message->photo)
                                            <div class="mt-2">
                                                <p class="text-muted small mb-1">Current Photo:</p>
                                                <img src="{{ asset('storage/' . $message->photo) }}" width="80"
                                                    class="rounded shadow-sm border">
                                            </div>
                                        @endif
                                        @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">Update Message</button>
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
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('editor');
</script>
@endpush

@push('styles')
<link rel="stylesheet" href="{{ asset('css/message/create.css') }}">
@endpush