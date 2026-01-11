@extends('admin.adminlayout')

@section('content')
    <div class="student-list-container">
        <h1>Manage New Admission</h1>

        <div class="table-actions">
            <a href="{{ route('admin.admission.create') }}" class="btn-primary">Add New Admission</a>
        </div>

        <!-- Filter/Search Form -->
        <form method="GET" action="{{ route('admin.admission.index') }}" class="filter-form">
            <input type="text" name="search" placeholder="Search by Name or Roll" value="{{ request('search') }}">

            {{-- <select name="class_id" class="filter-select">
                <option value="">All Classes</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                        {{ $class->name }}
                    </option>
                @endforeach
            </select> --}}

            {{-- <select name="section_id" class="filter-select">
                <option value="">All Sections</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" {{ request('section_id') == $section->id ? 'selected' : '' }}>
                        {{ $section->name }}
                    </option>
                @endforeach
            </select> --}}

            <button type="submit" class="btn-secondary">Filter</button>
            <a href="{{ route('admin.admission.index') }}" class="btn-light">Reset</a>
        </form>



        <table class="student-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>Mother's Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Roll</th>
                    <th>Photo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->fathers_name }}</td>
                        <td>{{ $student->mothers_name }}</td>
                        <td>{{ $student->student->class->name ?? 'N/A' }}</td>
                        <td>{{ $student->student->section->name ?? 'N/A' }}</td>
                        <td>{{ $student->student->roll }}</td>
                        
                        <td>
                            @if ($student->student->photo)
                                <img src="{{ asset('storage/' . $student->student->photo ?? '') }}" alt="Student Photo"
                                    class="student-photo" width="60">
                            @else
                                <span>No Photo</span>
                            @endif
                        </td>
                        {{-- <td><img src="{{ asset('storage/' . $student->student->photo ?? '') }}" alt="Student Photo"
                                    class="student-photo" width="60"></td>
                        <td> --}}
                        <td>
                            <a href="{{ route('admin.admission.edit', $student->id) }}" class="btn-secondary">Edit</a>
                            <form action="{{ route('admin.admission.destroy', $student->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="no-data">No students found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection


@push('styles')
    <link rel="stylesheet" href="{{ asset('css/students/index.css') }}">
@endpush
