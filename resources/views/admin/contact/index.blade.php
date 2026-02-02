@extends('admin.adminlayout')

@section('content')
    <div class="container-fluid py-4 col-md-10">
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0 text-gray-800">School Contact Information</h1>
            </div>
            <a href="{{ route('admin.contact.create') }}" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50 mr-2"></i> Add Contact
            </a>
        </div>

        {{-- Main Content Card --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-white d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Contact Details</h6>
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
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>Zip Code</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Fax</th>
                                <th class="text-center" style="width: 150px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td class="align-middle">{{ $contact->id }}</td>
                                    <td class="align-middle">{{ $contact->address }}</td>
                                    <td class="align-middle">{{ $contact->city }}</td>
                                    <td class="align-middle">{{ $contact->zip_code }}</td>
                                    <td class="align-middle">{{ $contact->phone_number }}</td>
                                    <td class="align-middle">{{ $contact->email }}</td>
                                    <td class="align-middle">{{ $contact->fax }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.contact.edit', $contact->id) }}"
                                                class="btn btn-outline-warning btn-sm" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.contact.destroy', $contact->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        No contact information found.
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