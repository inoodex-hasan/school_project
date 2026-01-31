@extends('admin.adminlayout')

@section('content')
    <div class="container py-5">
        {{-- Back Button --}}
        <div class="mb-4">
            <a href="{{ route('admin.notices.index') }}" class="text-decoration-none text-muted">
                <i class="fas fa-arrow-left mr-1"></i> Back to All Notices
            </a>
        </div>



        {{-- Main Notice Content Card --}}
        <div class="card shadow border-0 overflow-hidden">
            <div class="card-header bg-white border-bottom py-3">
                <h2 class="h4 mb-0 text-dark font-weight-bold">{{ $notice->title }}</h2>
            </div>
            <div class="card-body p-4 p-md-5">
                <div class="notice-content text-dark lead" style="line-height: 1.8;">
                    {!! $notice->content !!}
                </div>
            </div>

            {{-- Footer Actions --}}
            <div class="card-footer bg-light p-4 d-flex justify-content-end">
                <a href="{{ route('admin.notices.edit', $notice->id) }}" class="btn btn-warning px-4 mr-3">
                    <i class="fas fa-edit mr-1"></i> Edit Notice
                </a>

                <form action="{{ route('admin.notices.destroy', $notice->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this notice? This action cannot be undone.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger px-4">
                        <i class="fas fa-trash-alt mr-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .notice-content {
            color: #2d3436;
            word-wrap: break-word;
        }

        .notice-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .badge {
            font-size: 0.9rem;
            font-weight: 500;
        }

        .border-primary {
            border-width: 2px !important;
        }
    </style>
@endsection
