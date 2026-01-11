@extends('admin.adminlayout')

@section('content')
<div class="teacher-list-container">
    <h1>Manage Teachers</h1>

    <!-- Filter & Search -->
    <form method="GET" action="{{ route('admin.teachers.index') }}" class="filter-form">
        <div class="filters">
            <!-- Search by name or subject -->
            <input type="text" name="search" value="{{ request('search') }}" 
                   placeholder="Search by name or subject..." class="search-box">

                   <!-- Filter by subject -->
              <select name="subject_id" class="filter-select">
                <option value="">All Subjects</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>



            <!-- Filter by status -->
            <select name="status" class="filter-select">
                <option value="">All Status</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>

            <!-- Submit -->
            <button type="submit" class="btn-primary">Filter</button>
            <a href="{{ route('admin.teachers.index') }}" class="btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Actions -->
    <div class="table-actions">
        <a href="{{ route('admin.teachers.create') }}" class="btn-primary">Add Teacher</a>
    </div>

    <!-- Table -->
    <table class="teacher-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Email</th>
                <th>Photo</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($teachers as $teacher)
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->subject->name ?? 'N/A' }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td class="teacher-photo-cell">
                        @if($teacher->photo)
                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Teacher Photo" class="teacher-photo">
                        @else
                            <span>No Photo</span>
                        @endif
                    </td>
                    <td>{{ $teacher->phone }}</td>
                    <td>
                        @if($teacher->status)
                            <span class="status active">Active</span>
                        @else
                            <span class="status inactive">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.teachers.edit', $teacher->id) }}" class="btn-secondary">Edit</a>
                        <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="no-data">No teachers found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection


@push('styles')
<link rel="stylesheet" href="{{ asset('css/teachers/index.css') }}">
@endpush