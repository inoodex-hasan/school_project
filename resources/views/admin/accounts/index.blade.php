@extends('admin.adminlayout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0 text-dark">Student Accounts</h3>
                        </div>
                        <div class="col text-end">
                            <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary">
                                Add Account Entry
                            </a>
                        </div>
                    </div>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('admin.accounts.index') }}" class="mt-4">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label for="student_id" class="form-label">Filter by Student</label>
                                <select name="student_id" id="student_id" class="form-select">
                                    <option value="">All Students</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-secondary me-2">Filter</button>
                                <a href="{{ route('admin.accounts.index') }}" class="btn btn-outline-secondary">Reset</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Account Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Note</th>
                                    <th scope="col" class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($accounts as $account)
                                    <tr>
                                        <td>{{ $account->id }}</td>
                                        <td class="fw-medium">{{ $account->student->name }}</td>
                                        <td>
                                            <span class="badge {{ $account->type === 'credit' ? 'bg-success' : 'bg-danger' }}">
                                                {{ ucfirst($account->type) }}
                                            </span>
                                        </td>
                                        <td>{{ $account->accountType->name ?? '-' }}</td>
                                        <td>{{ number_format($account->amount, 2) }}</td>
                                        <td>{{ $account->date->format('Y-m-d') }}</td>
                                        <td class="text-muted">{{ Str::limit($account->note, 50) }}</td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                                            <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-5 text-muted">
                                            No account entries found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection