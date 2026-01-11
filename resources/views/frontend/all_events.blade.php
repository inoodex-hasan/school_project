@extends('layouts.app2')

@section('title', 'All Events')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">All Events</h1>

    @if($events->count() > 0)
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Published Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>
                            <a href="{{ route('events.show', $event->id) }}">
                                {{ $event->title }}
                            </a>
                        </td>
                        <td>{{ $event->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No events found.</p>
    @endif
</div>
@endsection
