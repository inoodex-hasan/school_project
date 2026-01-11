@extends('admin.adminlayout')

@section('content')
<div class="container">
    <div class="card shadow-lg p-4 mb-5 rounded">
        <!-- Photo -->
        @if($message->photo)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/'.$message->photo) }}" class="rounded-circle shadow" alt="{{ $message->title }}"
                width="150" height="150">
        </div>
        @endif

        <!-- Title -->
        <h2 class="text-center mb-2">{{ $message->title }}</h2>

        <!-- Designation -->
        <p class="text-center text-muted">
            {{ ucfirst(str_replace('-', ' ', $message->type)) }}
        </p>

        <hr>

        <!-- Message Content -->
        <div class="mt-4">
            {!! $message->content !!}
        </div>

        <!-- Back Button -->
        <div class="mt-4 text-center">
            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">← Back to Messages</a>
        </div>
    </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('css/admin/messages/show.css') }}">
@endpush