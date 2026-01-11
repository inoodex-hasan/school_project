@extends('admin.adminlayout')

@section('content')
    <div class="gallery-container">
    <h1>Manage Gallery</h1>

    {{-- Photos Section --}}
    <h2 class="section-title">Photos</h2>
    @if($photos->count())
        <div class="gallery-grid">
            @foreach($photos as $photo)
                <div class="gallery-item">
                    <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $photo->title }}">

                    <h4>{{ $photo->title }}</h4>
                    <form action="{{ route('admin.gallery.destroy', $photo->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                
                </div>
            @endforeach
        </div>
    @else
        <p>No photos found.</p>
    @endif

    {{-- Videos Section --}}
    <h2 class="section-title">Videos</h2>
    @if($videos->count())
        <div class="gallery-grid">
            @foreach($videos as $video)
                <div class="gallery-item">
                    <video controls>
                        <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">

                        Your browser does not support the video tag.
                    </video>
                    <h4>{{ $video->title }}</h4>
                    <form action="{{ route('admin.gallery.destroy', $video->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p>No videos found.</p>
    @endif
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/gallery/index.css') }}">
@endpush