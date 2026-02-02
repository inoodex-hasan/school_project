@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Section: {{ $section->name }}</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.section.index') }}" class="btn btn-primary px-4 rounded-2 shadow-sm">
                                    Back to List
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            {{-- Validation Errors --}}
                            @if ($errors->any())
                                <div class="alert alert-danger mb-4">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('admin.section.update', $section->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    {{-- Class Selection --}}
                                    <div class="form-group col-md-6">
                                        <label for="class_id">Class <span class="text-danger">*</span></label>
                                        <select name="class_id" id="class_id" class="form-control @error('class_id') is-invalid @enderror" required>
                                            <option value="" disabled>-- Select Class --</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}" {{ $section->class_id == $class->id ? 'selected' : '' }}>
                                                    {{ $class->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('class_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Section Name --}}
                                    <div class="form-group col-md-6">
                                        <label for="name">Section Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $section->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">Update Section</button>
                                    <a href="{{ route('admin.section.index') }}" class="btn btn-secondary btn-lg ml-2 px-4">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
