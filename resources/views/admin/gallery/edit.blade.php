@extends('admin.adminlayout')

@section('content')
<div class="container">
    <h2>Edit Gallery Item</h2>

    <form action="{{ route('admin.gallery.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div class="form-group">
            <label for="title">Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{ old('title', $item->title) }}" 
                required
            >
        </div>

        {{-- Preview --}}
        <div class="form-group">
            <label>Current File</label>
            @if($item->type === 'photo')
                <img src="{{ asset('storage/' . $item->file_path) }}" alt="{{ $item->title }}" width="200">
            @elseif($item->type === 'video')
                <video width="320" height="240" controls>
                    <source src="{{ asset('storage/' . $item->file_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @endif
        </div>

        {{-- Upload New File --}}
        <div class="form-group">
            <label for="file">Change File (optional)</label>
            <input type="file" name="file" id="file" accept="image/*,video/*">
            <small>If you don't want to change, leave this blank.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{
