@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1>Edit Teacher</h1>


<form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')


    <div class="form-group">
        <label>Full Name</label>
        <input type="text" name="name" value="{{ old('name', $teacher->name) }}" required>
    </div>

      <div class="form-group">
            <label>Subject</label>
            <select name="subject_id" class="form-control">
                <option value="">Select Subject</option>
                @foreach($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ old('subject_id', $teacher->subject_id ?? '') == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                </option>
            @endforeach
        </select>
        </div> 

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $teacher->email) }}" required>
    </div>

    <div class="form-group">
        <label>Current Photo</label><br>
        @if($teacher->photo)
            <img src="{{ asset('storage/' . $teacher->photo) }}" 
                 alt="Teacher Photo" 
                 width="100" height="100"
                 class="mb-2 rounded">
        @else
            <span>No Photo</span>
        @endif
    </div>

<div class="form-group">
    <label>Change Photo</label>
    <input type="file" name="photo" accept="image/*">
</div>


    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ old('phone', $teacher->phone) }}">
    </div>

    <div class="form-group">
        <label>Status</label>
        <select name="status">
            <option value="1" {{ $teacher->status ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !$teacher->status ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <button type="submit">Update Teacher</button>
</form>

</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('css/teachers/edit.css') }}">
@endpush