@extends('admin.adminlayout')

@section('content')
<div class="exam-routine-wrapper">
    <div class="exam-routine-container">
        <h2>Exam Routines</h2>
        <a href="{{ route('admin.exam_routine.create') }}" class="btn btn-primary mb-3">Upload New Routine</a>

        <!-- Routine Table -->
        <table class="routine-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Uploaded At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($routines as $index => $routine)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $routine->title }}</td>
                    <td>
                        <a href="{{ asset('storage/' . $routine->file) }}" target="_blank" class="btn btn-sm btn-info">
                            View PDF
                        </a>
                    </td>
                    <td>{{ $routine->created_at->format('d M, Y') }}</td>
                    <td>
                        <form action="{{ route('admin.exam_routine.destroy', $routine->id) }}" method="POST" onsubmit="return confirm('Delete this routine?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No exam routines uploaded yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/exam_routine/index.css') }}">
@endpush
