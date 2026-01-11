@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Latest Notices</h2>
 @foreach($notices ?? [] as $notice)
    @if(is_object($notice))
    <div class="card mb-3">
        <div class="card-body">
            <h4>{{ $notice->title }}</h4>
            <p>{{ $notice->content }}</p>
            <small class="text-muted">Posted on {{ $notice->created_at->format('d M Y') }}</small>
        </div>
    </div>
    @endif
@endforeach

</div>
@endsection
