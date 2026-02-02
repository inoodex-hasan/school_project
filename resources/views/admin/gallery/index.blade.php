@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Gallery Management</h1>
            </div>
            <!-- <div>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary shadow-sm mr-2">
                        <i class="fas fa-camera fa-sm text-white-50 mr-2"></i> Add Photo
                    </a>
                    <a href="{{ route('admin.gallery.create') }}" class="btn btn-info shadow-sm">
                        <i class="fas fa-video fa-sm text-white-50 mr-2"></i> Add Video
                    </a>
                </div> -->
        </div>

        {{-- Photos Section --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Photos</h6>
                <span class="badge bg-primary rounded-pill">{{ $photos->count() }} Items</span>
            </div>
            <div class="card-body">
                @if ($photos->count())
                    <div class="row">
                        @foreach ($photos as $photo)
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-img-top-wrapper" style="height: 200px; overflow: hidden; position: relative;">
                                        <img src="{{ asset('storage/' . $photo->path) }}" class="card-img-top w-100 h-100"
                                            style="object-fit: cover;" alt="{{ $photo->title }}">
                                    </div>
                                    <div class="card-body p-3 d-flex flex-column">
                                        <h6 class="card-title font-weight-bold text-dark mb-2 text-truncate"
                                            title="{{ $photo->title }}">
                                            {{ $photo->title }}
                                        </h6>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <small class="text-muted">{{ $photo->created_at->format('d M Y') }}</small>
                                            <div>
                                                <a href="{{ route('admin.gallery.edit', $photo->id) }}"
                                                    class="btn btn-outline-warning btn-sm btn-circle" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin.gallery.destroy', $photo->id) }}" method="POST"
                                                    class="d-inline" onsubmit="return confirm('Delete this photo?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-circle"
                                                        title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <p class="text-muted mb-0">No photos found in the gallery.</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Videos Section --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-info">Videos</h6>
                <span class="badge bg-info rounded-pill">{{ $videos->count() }} Items</span>
            </div>
            <div class="card-body">
                @if ($videos->count())
                    <div class="row">
                        @foreach ($videos as $video)
                            <div class="col-md-4 mb-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-img-top-wrapper bg-dark d-flex align-items-center justify-content-center"
                                        style="height: 250px; overflow: hidden;">
                                        <video controls class="w-100 h-100" style="object-fit: contain;">
                                            <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                    <div class="card-body p-3 d-flex flex-column">
                                        <h6 class="card-title font-weight-bold text-dark mb-2 text-truncate"
                                            title="{{ $video->title }}">
                                            {{ $video->title }}
                                        </h6>
                                        <div class="mt-auto d-flex justify-content-between align-items-center">
                                            <small class="text-muted">{{ $video->created_at->format('d M Y') }}</small>
                                            <div>
                                                <a href="{{ route('admin.gallery.edit', $video->id) }}"
                                                    class="btn btn-outline-warning btn-sm btn-circle" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin.gallery.destroy', $video->id) }}" method="POST"
                                                    class="d-inline" onsubmit="return confirm('Delete this video?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-circle"
                                                        title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-5">
                        <p class="text-muted mb-0">No videos found in the gallery.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <style>
        .btn-circle {
            width: 30px;
            height: 30px;
            padding: 0;
            line-height: 28px;
            border-radius: 50%;
            text-align: center;
        }

        .card-img-top-wrapper:hover img {
            transform: scale(1.05);
            transition: transform 0.3s ease;
        }

        .card-img-top-wrapper img {
            transition: transform 0.3s ease;
        }
    </style>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/gallery/index.css') }}">
@endpush