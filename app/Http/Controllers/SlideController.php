<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
    {
        $slides = Slide::orderByDesc('id')->get();
        return view('admin.slides.index', compact('slides'));
    }


    /**
     * Show the form for creating a new resource.
     */
 public function create()
    {
        return view('admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'title' => 'nullable|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        'link' => 'nullable|url',
    ]);

    $path = $request->file('image')->store('slides', 'public');

    Slide::create([
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'image' => $path,
        'link' => $request->link,
    ]);

    return redirect()->route('admin.slides.index')->with('success', 'Slide created successfully!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slides.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slide = Slide::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('slides', 'public');
            $slide->image = $path;
        }

        $slide->title = $request->title;
        $slide->subtitle = $request->subtitle;
        $slide->link = $request->link;
        $slide->save();

        return redirect()->route('admin.slides.index')->with('success', 'Slide updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return redirect()->route('admin.slides.index')->with('success', 'Slide deleted successfully!');
    }

    public function manage()
    {
        $slides = Slide::orderByDesc('id')->get();
        return view('admin.slides.manage', compact('slides'));
    }


}