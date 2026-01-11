<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SchoolClass;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getByClass($classId)
{
    $sections = Section::where('class_id', $classId)
                ->orderBy('name')
                ->get();

    return response()->json($sections);
}

public function index()
{
    $sections = Section::with('schoolClass')->paginate(10); 
    
    return view('admin.section.index', compact('sections'));
}


public function create()
{
    $classes = SchoolClass::all();

    return view('admin.section.create', compact('classes'));
}


public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'class_id' => 'required|exists:classes,id',
    ]);

    Section::create($request->only('name', 'class_id'));

    return redirect()->route('admin.section.index')->with('success', 'Section created successfully.');
}

public function edit($id)
{
    $section = Section::findOrFail($id);
    $classes = SchoolClass::all(); 

    return view('admin.section.edit', compact('section', 'classes'));
}


public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'class_id' => 'required|exists:classes,id',
    ]);

    $section = Section::findOrFail($id);
    $section->update($request->only('name', 'class_id'));

    return redirect()->route('admin.section.index')->with('success', 'Section updated successfully.');
}

public function destroy($id)
{
    $section = Section::findOrFail($id);
    $section->delete();

    return redirect()->route('admin.section.index')->with('success', 'Section deleted successfully.');
}



}
