@extends('admin.adminlayout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Create Section</h5>
        </div>
        <div class="card-body">


            <form action="{{ route('admin.section.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="class_id" class="form-label">Select Class</label>
                    <select name="class_id" id="class_id" class="form-select" required>
                        <option value="" disabled selected>-- Select Class --</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                {{ $class->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Section Name</label>
                    <input type="text" name="name" id="name" 
                           value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Save
                </button>
                <a href="{{ route('admin.section.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
