<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subject;
use App\Models\SchoolClass;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $subjects = Subject::with('schoolClass')->paginate(10);
    return view('admin.subject.index', compact('subjects'));
}


public function create()
{
    $classes = SchoolClass::oldest()->get();    
    return view('admin.subject.create', compact('classes'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'class_id' => 'required|exists:classes,id',
    ]);

    Subject::create($request->only('name', 'class_id'));

    return redirect()->route('admin.subject.index')->with('success', 'Subject created successfully.');
}

public function edit($id)
{
    $subject = Subject::findOrFail($id);
    $classes = SchoolClass::orderBy('name')->get();
    return view('admin.subject.edit', compact('subject', 'classes'));
}

public function update(Request $request, $id)
{
    $subject = Subject::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'class_id' => 'required|exists:classes,id',
    ]);

    $subject->update($request->only('name', 'class_id'));

    return redirect()->route('admin.subject.index')->with('success', 'Subject updated successfully.');
}

public function destroy($id)
{
    $subject = Subject::findOrFail($id);
    $subject->delete();

    return redirect()->route('admin.subject.index')->with('success', 'Subject deleted.');
}
}
