@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1>Account Types</h1>

    <div class="table-actions">
        <a href="{{ route('admin.account_types.create') }}" class="btn-primary">Add New Account Type</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($accountTypes as $type)
                <tr>
                    <td>{{ $type->id }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ ucfirst($type->type) }}</td>
                    <td>{{ $type->description ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.account_types.edit', $type->id) }}" class="btn-secondary">Edit</a>
                        <form action="{{ route('admin.account_types.destroy', $type->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No account types found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
