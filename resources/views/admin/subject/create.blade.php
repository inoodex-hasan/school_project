@extends('admin.adminlayout')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h5 class="mb-0">Create Subject</h5>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.subject.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="class_id" class="form-label">Select Class:</label>
                        <select name="class_id" class="form-select" required>
                            <option value="" disabled selected>Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>
                                    {{ $class->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('class_id') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                    </div>


                    <div class="mb-3">
                        <label for="name" class="form-label">Subject Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save"></i> Save
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection