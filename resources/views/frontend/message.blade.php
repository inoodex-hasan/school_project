@extends('layouts.app2')

@section('content')
<div class="container" style="max-width:800px; margin:auto; padding:20px;">
    
    {{-- Image --}}
    <div style="width:150px; height:150px; border-radius:50%; overflow:hidden; margin-bottom:20px;">
       <img src="{{ asset('storage/' . $message->photo) }}" 
     alt="{{ $message->title }}" 
     style="width:150px; height:150px; object-fit:cover; border-radius:50%; display:block;">

    </div>

    {{-- Heading --}}
    <h4 style="color:orange;">Message from {{ Str::title($message->type) }}</h4>
    <h2 style="margin:10px 0;">{{ $message->title }}</h2>

    {{-- Full Content --}}
   <p style="line-height:1.6; font-size:16px;">
    {!! $message->content !!}
</p>


    {{-- Back Link --}}
    <a href="{{ url()->previous() }}" style="display:inline-block; margin-top:20px; color:#007bff;">
        ← Back
    </a>
</div>
@endsection
