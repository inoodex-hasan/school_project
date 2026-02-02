@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm border-0">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Edit Account Type: {{ $accountType->name }}</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.account_types.index') }}"
                                    class="btn btn-outline-primary px-4 rounded-2">
                                    <i class="fas fa-arrow-left me-2"></i> Back
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

                            <form action="{{ route('admin.account_types.update', $accountType->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Account Type Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $accountType->name) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                                    <select name="type" id="type"
                                        class="form-control @error('type') is-invalid @enderror" required>
                                        <option value="">Select Type</option>
                                        <option value="income"
                                            {{ old('type', $accountType->type) == 'income' ? 'selected' : '' }}>Income
                                        </option>
                                        <option value="expense"
                                            {{ old('type', $accountType->type) == 'expense' ? 'selected' : '' }}>Expense
                                        </option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="3"
                                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $accountType->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="{{ route('admin.account_types.index') }}"
                                        class="btn btn-secondary btn-lg me-2 px-4">Cancel</a>
                                    <button type="submit" class="btn btn-primary btn-lg px-4">Update Account Type</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
