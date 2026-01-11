@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h1>Edit School Contact</h1>

    <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST">
        @csrf
    </form>


    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="{{ old('address', $contact->address) }}" required>
    </div>

    <div class="mb-3">
        <label>City</label>
        <input type="text" name="city" class="form-control" value="{{ old('city', $contact->city) }}" required>
    </div>

    <div class="mb-3">
        <label>Zip Code</label>
        <input type="text" name="zip_code" class="form-control" value="{{ old('zip_code', $contact->zip_code) }}">
    </div>

    <div class="mb-3">
        <label>Phone Number</label>
        <input type="text" name="phone_number" class="form-control"
            value="{{ old('phone_number', $contact->phone_number) }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email) }}">
    </div>

    <div class="mb-3">
        <label>Website</label>
        <input type="url" name="website" class="form-control" value="{{ old('website', $contact->website) }}">
    </div>

    <div class="mb-3">
        <label>Fax</label>
        <input type="text" name="fax" class="form-control" value="{{ old('fax', $contact->fax) }}">
    </div>

    <div class="mb-3">
        <label>Facebook URL</label>
        <input type="url" name="social_facebook" class="form-control"
            value="{{ old('social_facebook', $contact->social_facebook) }}">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection