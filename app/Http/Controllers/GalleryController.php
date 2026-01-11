<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
{
    $photos = Gallery::where('type', 'photo')->latest()->get();
    $videos = Gallery::where('type', 'video')->latest()->get();

    return view('admin.gallery.index', compact('photos', 'videos'));
}


   public function photos()
{
    return view('admin.gallery.photos');
}

public function videos()
{
    return view('admin.gallery.videos');
}

    public function create()
    {
        return view('admin.gallery.create');
    }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'type'  => 'required|in:photo,video',
        'file'  => 'required|file|max:10240',
    ]);

    $path = $request->file('file')->store(
        $request->type === 'photo' ? 'gallery/photos' : 'gallery/videos',
        'public'
    );

    Gallery::create([
        'title' => $request->title,
        'type'  => $request->type,
        'path'  => $path,
    ]);

    return redirect()->route('admin.gallery.index')
                     ->with('success', ucfirst($request->type) . ' uploaded successfully!');
}

public function edit($id)
{
    $galleryItem = Gallery::findOrFail($id);
    return view('admin.gallery.edit', compact('galleryItem'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'file'  => 'nullable|file|max:10240',
    ]);

    $galleryItem = Gallery::findOrFail($id);
    $galleryItem->title = $request->title;

    if ($request->hasFile('file')) {
        $path = $request->file('file')->store(
            $galleryItem->type === 'photo' ? 'gallery/photos' : 'gallery/videos',
            'public'
        );
        $galleryItem->path = $path;
    }

    $galleryItem->save();

    return redirect()->route('admin.gallery.index')
                     ->with('success', 'Gallery item updated successfully!');
}

public function destroy($id)
{
    $galleryItem = Gallery::findOrFail($id);
    $galleryItem->delete();

    return redirect()->route('admin.gallery.index')
                     ->with('success', 'Gallery item deleted successfully!');
}
}