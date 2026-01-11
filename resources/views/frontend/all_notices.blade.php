@extends('layouts.app2')

@section('title', 'All Notices')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">All Notices</h1>

    @if($notices->count() > 0)
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Published Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notices as $notice)
                    <tr>
                        <td>
                            <a href="{{ route('notices.show', $notice->id) }}">
                                {{ $notice->title }}
                            </a>
                        </td>
                        <td>{{ $notice->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No notices found.</p>
    @endif
</div>
@endsection
