@extends('admin.adminlayout')

@section('content')
    <h1>Manage Slides</h1>

    <a href="{{ route('admin.slides.create') }}" class="btn btn-add">Add New Slide</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Subtitle</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($slides as $slide)
                <tr>
                    <td>{{ $slide->id }}</td>
                    <td>{{ $slide->title }}</td>
                    <td>{{ $slide->subtitle }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $slide->image) }}" alt="slide" width="80">
                    <td>
                        <a href="{{ route('admin.slides.edit', $slide->id) }}" class="btn btn-edit">Edit</a>
                        <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete"
                                onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">No slides found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

<!-- @push('styles')
    <link rel="stylesheet" href="{{ asset('css/slides/index.css') }}">
@endpush -->
