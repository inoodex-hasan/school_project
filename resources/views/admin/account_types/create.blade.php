@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1>Add New Account Type</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.account_types.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Account Type Name</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <button type="submit" class="btn-primary">Save</button>
        <a href="{{ route('admin.account_types.index') }}" class="btn-light">Cancel</a>
    </form>
</div>
@endsection
