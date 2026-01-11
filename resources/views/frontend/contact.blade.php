@extends('layouts.app2')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title mb-4">Contact Us</h2>
            <p><strong>Address:</strong> {{ $contact->address }}, {{ $contact->city }}, {{ $contact->zip_code }}</p>
            <p><strong>Phone:</strong> {{ $contact->phone_number }}</p>
            @if($contact->email)
            <p><strong>Email:</strong> <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
            @endif
            @if($contact->website)
            <p><strong>Website:</strong> <a href="{{ $contact->website }}" target="_blank">{{ $contact->website }}</a>
            </p>
            @endif
            @if($contact->fax)
            <p><strong>Fax:</strong> {{ $contact->fax }}</p>
            @endif
            @if($contact->social_facebook)
            <p><strong>Facebook:</strong> <a href="{{ $contact->social_facebook }}"
                    target="_blank">{{ $contact->social_facebook }}</a></p>
            @endif
        </div>
        @endsection