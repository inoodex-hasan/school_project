@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1>School Contacts</h1>
    <a href="{{ route('admin.contact.create') }}" class="btn btn-primary mb-3">Add New Contact</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Address</th>
                <th>City</th>
                <th>Zip Code</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Fax</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->address }}</td>
                <td>{{ $contact->city }}</td>
                <td>{{ $contact->zip_code}}</td>
                <td>{{ $contact->phone_number }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->fax }}</td>
                <td>
                    <a href="{{ route('admin.contact.edit', $contact->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection