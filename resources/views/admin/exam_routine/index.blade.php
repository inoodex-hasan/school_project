@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Exam Routine Management</h1>
            </div>
            <a href="{{ route('admin.exam_routine.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-upload fa-sm text-white-50 mr-2"></i> Upload New Routine
            </a>
        </div>

        {{-- Main Content Card --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Uploaded Exam Routines</h6>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Title</th>
                                <th style="width: 150px;">File</th>
                                <th style="width: 150px;">Uploaded At</th>
                                <th class="text-center" style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($routines as $index => $routine)
                                <tr>
                                    <td class="align-middle">{{ $index + 1 }}</td>
                                    <td class="align-middle font-weight-bold">{{ $routine->title }}</td>
                                    <td class="align-middle">
                                        <a href="{{ asset('storage/' . $routine->file) }}" target="_blank"
                                            class="btn btn-sm btn-info">
                                            <i class="fas fa-file-pdf mr-1"></i> View PDF
                                        </a>
                                    </td>
                                    <td class="align-middle">{{ $routine->created_at->format('d M, Y') }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.exam_routine.destroy', $routine->id) }}" method="POST"
                                            onsubmit="return confirm('Delete this routine?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        No exam routines uploaded yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection