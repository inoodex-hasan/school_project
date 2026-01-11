@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="card-title">{{ @ $notice->title }}</h1>
            <p class="card-text">{!! @ $notice->content !!}</p>
            <small class="text-muted">Published at: {{ $notice->created_at->format('d M Y') }}</small>
        </div>
    </div>

    <a href="{{ route('notices.index') }}" class="btn btn-primary mt-3">
        All notices
    </a>
</div>
@endsection
