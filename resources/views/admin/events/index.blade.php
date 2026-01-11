@extends('admin.adminlayout')

@section('content')
<div class="event-list-container">
    <h1>Manage Events</h1>

    <div class="table-actions">
        <a href="{{ route('admin.events.create') }}" class="btn-primary">Add Event</a>
    </div>

    <table class="event-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{!! $event->description !!}</td>
                <td>{{ $event->event_date }}</td>
                <td>
                    <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->title }}" style="width:100px; height:auto;">
                </td>
                <td>
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn-secondary">Edit</a>
                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="no-data">No events found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/events/index.css') }}">
@endpush
