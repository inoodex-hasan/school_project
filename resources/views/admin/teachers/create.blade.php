@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Add New Teacher</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.teachers.index') }}" class="btn btn-primary px-4 rounded-2 shadow-sm">
                                    <i class="fas fa-arrow-left mr-1"></i> Back to List
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    {{-- Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') }}" placeholder="Enter full name" required>
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address <span
                                                class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Enter email address" required>
                                    </div>

                                    {{-- Phone --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="phone" id="phone" class="form-control"
                                            value="{{ old('phone') }}" placeholder="Enter phone number" required>
                                    </div>

                                    {{-- Subject --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="subject_id" class="form-label">Subject</label>
                                        <select name="subject_id" id="subject_id" class="form-control">
                                            <option value="">Select Subject</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}"
                                                    {{ old('subject_id') == $subject->id ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Status --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="status" class="form-label">Status <span
                                                class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>

                                    {{-- Photo --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="photo" class="form-label">Photo</label>
                                        <div class="custom-file">
                                            <input type="file" name="photo" id="photo" class="custom-file-input"
                                                accept="image/*">
                                            <label class="custom-file-label" for="photo">Choose file</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg shadow-sm px-5">
                                        <!-- <i class="fas fa-save mr-2"></i>  -->
                                        Save Teacher
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            // Custom file input label update
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
    @endpush
@endsection