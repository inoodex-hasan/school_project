@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm border-0">
                        <div class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Add Account Entry</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.accounts.index') }}" class="btn btn-outline-primary px-4 rounded-2">
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

                            <form action="{{ route('admin.accounts.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="student_id" class="form-label">Student <span
                                                class="text-danger">*</span></label>
                                        <select name="student_id" id="student_id"
                                            class="form-control select2 @error('student_id') is-invalid @enderror" required>
                                            <option value="">Select Student</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}"
                                                    {{ old('student_id', $student_id ?? '') == $student->id ? 'selected' : '' }}>
                                                    {{ $student->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('student_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="date" class="form-label">Date <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="date" id="date"
                                            class="form-control @error('date') is-invalid @enderror"
                                            value="{{ old('date', date('Y-m-d')) }}" required>
                                        @error('date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="type" class="form-label">Transaction Type <span
                                                class="text-danger">*</span></label>
                                        <select name="type" id="type"
                                            class="form-control @error('type') is-invalid @enderror" required>
                                            <option value="">Select Type</option>
                                            <option value="income" {{ old('type') == 'income' ? 'selected' : '' }}>Income
                                            </option>
                                            <option value="expense" {{ old('type') == 'expense' ? 'selected' : '' }}>
                                                Expense</option>
                                        </select>
                                        @error('type')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="account_type_id" class="form-label">Account Category</label>
                                        <select name="account_type_id" id="account_type_id"
                                            class="form-control @error('account_type_id') is-invalid @enderror">
                                            <option value="">Select Category</option>
                                            @foreach ($accountTypes as $type)
                                                <option value="{{ $type->id }}"
                                                    {{ old('account_type_id') == $type->id ? 'selected' : '' }}>
                                                    {{ $type->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('account_type_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="amount" class="form-label">Amount <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">৳</span>
                                        <input type="number" name="amount" id="amount" step="0.01"
                                            class="form-control @error('amount') is-invalid @enderror"
                                            placeholder="0.00" value="{{ old('amount') }}" required>
                                    </div>
                                    @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea name="note" id="note" rows="3" class="form-control @error('note') is-invalid @enderror"
                                        placeholder="Optional note about this transaction">{{ old('note') }}</textarea>
                                    @error('note')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    <a href="{{ route('admin.accounts.index') }}"
                                        class="btn btn-secondary btn-lg me-2 px-4">Cancel</a>
                                    <button type="submit" class="btn btn-primary btn-lg px-4">Save Entry</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
