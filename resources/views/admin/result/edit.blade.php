@extends('admin.adminlayout')

@section('content')
<div class="result-edit-container">
    <h1>Edit Result</h1>

    @if ($errors->any())
        <div class="alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.result.update', $result->id) }}" method="POST" class="result-form">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="student_id">Student</label>
            <select name="student_id" id="student_id" class="form-control" required>
                <option value="">-- Select Student --</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" 
                        {{ $student->id == $result->student_id ? 'selected' : '' }}>
                        {{ $student->name }} (Class: {{ $student->class }}, Roll: {{ $student->roll }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="grade">Grade</label>
            <select name="grade" id="grade" class="form-control" required>
                <option value="">-- Select Grade --</option>
                <option value="A+" {{ $result->grade == 'A+' ? 'selected' : '' }}>A+</option>
                <option value="A" {{ $result->grade == 'A' ? 'selected' : '' }}>A</option>
                <option value="A-" {{ $result->grade == 'A-' ? 'selected' : '' }}>A-</option>
                <option value="B+" {{ $result->grade == 'B+' ? 'selected' : '' }}>B+</option>
                <option value="B" {{ $result->grade == 'B' ? 'selected' : '' }}>B</option>
                <option value="B-" {{ $result->grade == 'B-' ? 'selected' : '' }}>B-</option>
                <option value="C+" {{ $result->grade == 'C+' ? 'selected' : '' }}>C+</option>
                <option value="C" {{ $result->grade == 'C' ? 'selected' : '' }}>C</option>
                <option value="C-" {{ $result->grade == 'C-' ? 'selected' : '' }}>C-</option>
                <option value="D" {{ $result->grade == 'D' ? 'selected' : '' }}>D</option>
                <option value="F" {{ $result->grade == 'F' ? 'selected' : '' }}>F</option>
            </select>
        </div>

        <button type="submit" class="btn-primary">Update Result</button>
    </form>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/result/edit.css') }}">
@endpush
