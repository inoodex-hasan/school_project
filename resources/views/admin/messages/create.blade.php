@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1>Create Message</h1>

    <form action="{{ route('admin.messages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Message Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter message title" required>
        </div>

        <div class="form-group">
            <label>Message Content</label>
            <textarea id="editor" name="content" rows="6" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="type">Designation</label>
            <select name="type" id="type" class="form-control" required>
                <option value="">-- Select Designation --</option>
                <option value="Principal" {{ old('type')=='Principal' ? 'selected' : '' }}>Principal</option>
                <option value="Vice Principal" {{ old('type')=='Vice Principal' ? 'selected' : '' }}>Vice Principal
                </option>
                <option value="Head Master" {{ old('type')=='Head Master' ? 'selected' : '' }}>Head Master</option>
                <option value="Head Mistress" {{ old('type')=='Head Mistress' ? 'selected' : '' }}>Head Mistress
                </option>
                <option value="Director" {{ old('type')=='Director' ? 'selected' : '' }}>Director</option>
                <option value="Managing Director" {{ old('type')=='Managing Director' ? 'selected' : '' }}>Managing
                    Director</option>
                <option value="Chairman" {{ old('type')=='Chairman' ? 'selected' : '' }}>Chairman</option>
                <option value="Co Chairman" {{ old('type')=='Co-Chairman' ? 'selected' : '' }}>Co Chairman</option>
            </select>
        </div>

        <!-- New Photo Upload -->
        <div class="form-group">
            <label for="photo">Upload Photo</label>
            <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Publish</button>
    </form>
</div>
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