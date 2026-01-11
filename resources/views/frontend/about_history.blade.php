@extends('layouts.app2')

@section('content')
<section class="history__area">
    <div class="container">
        <!-- Image on top -->
        <div class="history__img text-center mb-4">
            @if($about?->photo)
            <img src="{{ asset('storage/' . $about->photo) }}" alt="{{ $about->title ?? 'School History' }}"
                class="img-fluid w-25">
            @else
            <img src="{{ asset('images/default.png') }}" alt="Default School History" class="img-fluid">
            @endif
        </div>

        <!-- Content below -->
        <div class="history__content text-center">
            <h2>{{ $about->title ?? 'School History' }}</h2>
            <p>
                {!! $about->content ?? 'No content available' !!}
            </p>
        </div>
    </div>
</section>


@endsection