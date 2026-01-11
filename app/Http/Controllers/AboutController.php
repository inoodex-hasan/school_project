<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
public function index()
{
    $abouts = About::all();
    return view('admin.about.index', compact('abouts'));
}


    public function create()
    {
        return view('admin.about.create');
    }

    public function edit($id)
{
    $about = About::findOrFail($id);
    return view('admin.about.edit', compact('about'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'nullable|string',
        'photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $about = About::findOrFail($id);

    $data = $request->only(['title','content']);

    if ($request->hasFile('photo')) {
    $data['photo'] = $request->file('photo')->store('about/photos', 'public');
}

    $about->update($data);

    return redirect()
        ->route('admin.about.index')
        ->with('success', 'About updated successfully!');
}

 public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('about/photos', 'public');
        } else {
         $url = asset('images/default.png');
}

        About::create([
            'title'   => $request->title,
            'content' => $request->content,
            'photo'   => $path,
        ]);

        return redirect()->route('admin.about.index')->with('success', 'About created successfully!');
    }
    public function show($id)
    {
        $about = About::findOrFail($id);
        return view('admin.about.show', compact('about'));
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);

        if ($about->photo && Storage::disk('public')->exists($about->photo)) {
            Storage::disk('public')->delete($about->photo);
        }

        $about->delete();

        return redirect()->route('admin.about.index')->with('success', 'About deleted successfully!');
    }

}