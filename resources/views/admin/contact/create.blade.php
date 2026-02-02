@extends('admin.adminlayout')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card shadow-sm border-0">
                        <div
                            class="card-header d-flex justify-content-between align-items-center py-3 bg-white border-bottom">
                            <h4 class="mb-0 fw-semibold text-dark">Add School Contact Information</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.contact.index') }}" class="btn btn-outline-primary px-4 rounded-2">
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

                            <form action="{{ route('admin.contact.store') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="address" class="form-label">Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address"
                                            class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address', $contact->address ?? '') }}" required>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                        <input type="text" name="city" id="city"
                                            class="form-control @error('city') is-invalid @enderror"
                                            value="{{ old('city', $contact->city ?? '') }}" required>
                                        @error('city')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="zip_code" class="form-label">Zip Code</label>
                                        <input type="text" name="zip_code" id="zip_code"
                                            class="form-control @error('zip_code') is-invalid @enderror"
                                            value="{{ old('zip_code', $contact->zip_code ?? '') }}">
                                        @error('zip_code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="phone_number" class="form-label">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="phone_number" id="phone_number"
                                            class="form-control @error('phone_number') is-invalid @enderror"
                                            value="{{ old('phone_number', $contact->phone_number ?? '') }}" required>
                                        @error('phone_number')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $contact->email ?? '') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-3">
                                        <label for="website" class="form-label">Website</label>
                                        <input type="url" name="website" id="website"
                                            class="form-control @error('website') is-invalid @enderror"
                                            value="{{ old('website', $contact->website ?? '') }}">
                                        @error('website')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group mb-3">
                                        <label for="fax" class="form-label">Fax</label>
                                        <input type="text" name="fax" id="fax"
                                            class="form-control @error('fax') is-invalid @enderror"
                                            value="{{ old('fax', $contact->fax ?? '') }}">
                                        @error('fax')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group mb-4">
                                        <label for="social_facebook" class="form-label">Facebook URL</label>
                                        <input type="url" name="social_facebook" id="social_facebook"
                                            class="form-control @error('social_facebook') is-invalid @enderror"
                                            value="{{ old('social_facebook', $contact->social_facebook ?? '') }}">
                                        @error('social_facebook')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="{{ route('admin.contact.index') }}"
                                        class="btn btn-secondary btn-lg me-2 px-4">Cancel</a>
                                    <button type="submit" class="btn btn-primary btn-lg px-4">Save Contact</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection