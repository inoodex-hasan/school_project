@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">{{ $event->title }}</h1>
            @if($event->photo)
                <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->title }}" class="img-fluid mb-3" style="width: 350px; height: auto;">
            @endif
            <p class="card-text">{!! $event->description !!}</p>
            <small class="text-muted">Published at: {{ $event->created_at->format('d M Y') }}</small>
        </div>
    </div>

    <a href="{{ route('events.index') }}" class="btn btn-primary mt-3">
         All events
    </a>
</div>
@endsection
