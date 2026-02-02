@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow">
                        <div
                            class="card-header bg-white py-3 d-flex justify-content-between align-items-center border-bottom">
                            <h4 class="mb-0 fw-bold text-dark">Message Details</h4>
                            <a href="{{ route('admin.messages.index') }}"
                                class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                <i class="fas fa-arrow-left mr-1"></i> Back to Messages
                            </a>
                        </div>
                        <div class="card-body p-5">
                            {{-- Photo & Header --}}
                            <div class="text-center mb-4">
                                @if ($message->photo)
                                    <img src="{{ asset('storage/' . $message->photo) }}"
                                        class="rounded-circle shadow-sm border mb-3" alt="{{ $message->title }}" width="120"
                                        height="120" style="object-fit: cover;">
                                @else
                                    <div class="rounded-circle shadow-sm border mb-3 d-flex align-items-center justify-content-center mx-auto bg-light text-muted"
                                        style="width: 120px; height: 120px;">
                                        <i class="fas fa-user fa-3x"></i>
                                    </div>
                                @endif

                                <h2 class="h3 font-weight-bold text-dark mb-1">{{ $message->title }}</h2>
                                <span class="badge badge-primary px-3 py-2 rounded-pill text-uppercase"
                                    style="font-size: 0.8rem; letter-spacing: 0.5px;">
                                    {{ ucfirst(str_replace('-', ' ', $message->type)) }}
                                </span>
                                <p class="text-muted mt-2 small">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    Published on {{ $message->created_at->format('d M, Y h:i A') }}
                                </p>
                            </div>

                            <hr class="my-4">

                            {{-- Content --}}
                            <div class="message-content text-justify px-3">
                                {!! $message->content !!}
                            </div>

                            {{-- Footer Actions --}}
                            <div class="mt-5 text-center">
                                <a href="{{ route('admin.messages.edit', $message->id) }}"
                                    class="btn btn-warning btn-lg px-5 rounded-pill shadow-sm text-white">
                                    <i class="fas fa-edit mr-2"></i> Edit Message
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .message-content {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #4a4a4a;
        }

        .message-content p {
            margin-bottom: 1.5rem;
        }
    </style>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/messages/show.css') }}">
@endpush