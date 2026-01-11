@extends('admin.adminlayout')

@section('content')
<div class="routine-list-container">
    <h1>Manage Class Routine</h1>

    <div class="table-actions">
        <a href="{{ route('admin.class_routine.create') }}" class="btn-primary">Add Routine</a>
    </div>


    @forelse($routines->groupBy('class_id') as $classId => $classRoutines)
        @php
            $className = \App\Models\SchoolClass::find($classId)->name ?? 'Unknown Class';
        @endphp
        <details class="dropdown">
            <summary class="dropdown-header">📘 Class: {{ $className }}</summary>

            @foreach($classRoutines->groupBy('section_id') as $sectionId => $sectionRoutines)
                @php
                    $sectionName = \App\Models\Section::find($sectionId)->name ?? 'Unknown Section';
                @endphp
                <details class="dropdown nested">
                    <summary class="dropdown-header">📖 Section: {{ $sectionName }}</summary>

                    <table class="routine-table">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sectionRoutines as $routine)
                            @php
                                $subjectName = $routine->subject ? $routine->subject->name : 'Unknown';
                                $teacherName = $routine->teacher ? $routine->teacher->name : 'Unknown';
                            @endphp
                            <tr>
                                <td>{{ $routine->day }}</td>
                                <td>{{ $routine->subject->name ?? 'Unknown' }}</td>
                                <td>{{ $routine->teacher->name ?? 'Unknown' }}</td>

                                <td>{{ $routine->start_time }} - {{ $routine->end_time }}</td>
                                <td>
                                    <a href="{{ route('admin.class_routine.edit', $routine->id) }}">Edit</a>
                                    <form action="{{ route('admin.class_routine.destroy', $routine->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                      <a href="{{ route('admin.class_routine.export', ['class_id' => $classId, 'section_id' => $sectionId]) }}" 
                                     target="_blank">
                                            Export PDF
                                        </a>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </details>
            @endforeach
        </details>
    @empty
        <p class="no-data">No routines available</p>
    @endforelse
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/class_routine/index.css') }}">
@endpush
