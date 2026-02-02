@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Class Routine Management</h1>
            </div>
            <a href="{{ route('admin.class_routine.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add New Routine
            </a>
        </div>

        {{-- Main Content Card --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Class Routines</h6>
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
                    {{-- Grouped by Class and Section --}}
                    @forelse($routines->groupBy('class_id') as $classId => $classRoutines)
                        @php
                            $className = \App\Models\SchoolClass::find($classId)->name ?? 'Unknown Class';
                        @endphp

                        <div class="card mb-4 border-left-primary">
                            <div class="card-header bg-light">
                                <h5 class="m-0 font-weight-bold text-dark">
                                    <i class="fas fa-chalkboard-teacher mr-2 text-primary"></i>
                                    Class: {{ $className }}
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                @foreach ($classRoutines->groupBy('section_id') as $sectionId => $sectionRoutines)
                                    @php
                                        $sectionName = \App\Models\Section::find($sectionId)->name ?? 'Unknown Section';
                                    @endphp
                                    <div class="p-3 border-bottom">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="text-secondary font-weight-bold mb-0">
                                                <i class="fas fa-users mr-2"></i> Section: {{ $sectionName }}
                                            </h6>
                                            <a href="{{ route('admin.class_routine.export', ['class_id' => $classId, 'section_id' => $sectionId]) }}"
                                                class="btn btn-sm btn-outline-danger" target="_blank">
                                                <i class="fas fa-file-pdf mr-1"></i> Export PDF
                                            </a>
                                        </div>

                                        <table class="table table-bordered table-sm table-hover">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Day</th>
                                                    <th>Subject</th>
                                                    <th>Teacher</th>
                                                    <th>Time</th>
                                                    <th class="text-right" style="width: 150px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sectionRoutines as $routine)
                                                    <tr>
                                                        <td class="align-middle">
                                                            <span class="badge badge-info">{{ $routine->day }}</span>
                                                        </td>
                                                        <td class="align-middle font-weight-bold">
                                                            {{ $routine->subject->name ?? 'Unknown' }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ $routine->teacher->name ?? 'Unknown' }}
                                                        </td>
                                                        <td class="align-middle">
                                                            {{ \Carbon\Carbon::parse($routine->start_time)->format('h:i A') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($routine->end_time)->format('h:i A') }}
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group" role="group">
                                                                <a href="{{ route('admin.class_routine.edit', $routine->id) }}"
                                                                    class="btn btn-outline-warning btn-sm" title="Edit">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                                <form action="{{ route('admin.class_routine.destroy', $routine->id) }}"
                                                                    method="POST" class="d-inline"
                                                                    onsubmit="return confirm('Are you sure?');">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                                                        title="Delete">
                                                                        <i class="fas fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">
                            <p class="text-muted mb-0">No routines found. Please add a new routine.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection