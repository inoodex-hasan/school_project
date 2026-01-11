@extends('admin.adminlayout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"> Edit Notice</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.notices.update', $notice->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Notice Title --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Notice Title</label>
                    <input type="text" 
                           class="form-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $notice->title) }}" 
                           required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Notice Content --}}
                <div class="mb-3">
                    <label for="editor" class="form-label">Notice Content</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" 
                              id="editor" 
                              name="content" 
                              rows="6" 
                              placeholder="Write your notice..." 
                              required>{{ old('content', $notice->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="1" {{ $notice->status ? 'selected' : '' }}> Active</option>
                        <option value="0" {{ !$notice->status ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                {{-- Submit --}}
                <div class="d-flex justify-content-between">

                    <button type="submit" class="btn btn-success"> Update Notice</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


@push('scripts')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endpush

<!-- @push('styles')
<link rel="stylesheet" href="{{ asset('css/notice/edit.css') }}">
@endpush -->

