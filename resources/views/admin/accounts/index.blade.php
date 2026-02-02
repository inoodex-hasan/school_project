@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">Account Management</h1>
            </div>
            <a href="{{ route('admin.accounts.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add Account Entry
            </a>
        </div>

        {{-- Stats Overview --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Entries</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $accounts->count() }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Income</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            ৳{{ number_format($accounts->where('type', 'income')->sum('amount'), 2) }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Expense</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            ৳{{ number_format($accounts->where('type', 'expense')->sum('amount'), 2) }}</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Content Table --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">All Account Entries</h6>

                {{-- Filter Form --}}
                <form method="GET" action="{{ route('admin.accounts.index') }}" class="form-inline">
                    <div class="inputs-group">
                        <select name="student_id" id="student_id" class="form-control form-control-sm mr-2"
                            onchange="this.form.submit()">
                            <option value="">All Students</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                                    {{ $student->name }}
                                </option>
                            @endforeach
                        </select>
                        <a href="{{ route('admin.accounts.index') }}" class="btn btn-secondary btn-sm">Reset</a>
                    </div>
                </form>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle" width="100%" cellspacing="0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0">Student</th>
                                <th class="border-0">Type</th>
                                <th class="border-0">Account Type</th>
                                <th class="border-0">Amount</th>
                                <th class="border-0">Date</th>
                                <th class="border-0">Note</th>
                                <th class="border-0 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($accounts as $account)
                                <tr>
                                    <td class="font-weight-bold text-dark">{{ $account->student->name }}</td>
                                    <td>
                                        <span class="badge {{ $account->type === 'income' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($account->type) }}
                                        </span>
                                    </td>
                                    <td>{{ $account->accountType->name ?? '-' }}</td>
                                    <td class="font-weight-bold text-dark">৳{{ number_format($account->amount, 2) }}</td>
                                    <td>{{ $account->date->format('d M Y') }}</td>
                                    <td>{{ Str::limit($account->note, 30) }}</td>
                                    <td class="text-right">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.accounts.edit', $account->id) }}"
                                                class="btn btn-outline-warning btn-sm mx-1" title="Edit">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.accounts.destroy', $account->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm mx-1">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">
                                        <p>No account entries found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection