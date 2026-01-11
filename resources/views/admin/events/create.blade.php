@extends('admin.adminlayout')

@section('content')
<div class="event-form-container">
    <h1>Add Event</h1>

    <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div>
            <label>Event Title</label>
            <input type="text" name="title" placeholder="Enter event title" required>
        </div>

        <!-- Date -->
        <div>
            <label>Event Date</label>
            <input type="date" name="event_date" required>
        </div>

        <!-- Content -->
        <div>
            <label>Event Description</label>
            <textarea name="description" rows="5" placeholder="Write event details..." required></textarea>
        </div>

        <!-- Photo -->
        <div>
            <label>Event Photo</label>
            <input type="file" name="photo" required>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary"> Save Event</button>
        </div>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/events/create.css') }}">
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endpush
