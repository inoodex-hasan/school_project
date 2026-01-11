@extends('admin.adminlayout')

@section('content')
<div class="event-form-container">
    <h1>Edit Event</h1>

<form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>Event Title</label>
        <input type="text" name="title" value="{{ $event->title }}" required>
    </div>

    <div>
        <label>Event Date</label>
        <input type="date" name="event_date" value="{{ $event->event_date }}" required>
    </div>

    <div>
        <label>Event Description</label>
        <textarea name="description">{{ $event->description }}</textarea>
    </div>

    @if($event->photo)
        <div>
            <label>Current Photo</label>
            <img src="{{ asset('storage/' . $event->photo) }}" alt="Event Photo" width="150">
        </div>
    @endif

    <div>
        <label>Event Photo</label>
        <input type="file" name="photo" accept="image/*">
    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Update Event</button>
    </div>
</form>

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/events/edit.css') }}">
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endpush