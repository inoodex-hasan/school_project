<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $classes = SchoolClass::with('sections', 'subjects')->paginate(10);
        return view('admin.schoolclass.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.schoolclass.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:classes,name|max:255',
        ]);
        SchoolClass::create($validated);
        return redirect()->route('admin.schoolclass.index')->with('success', 'Class created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolClass $schoolClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $class = SchoolClass::findOrFail($id);
    return view('admin.schoolclass.edit', compact('class'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $class = SchoolClass::findOrFail($id);
    $class->update([
        'name' => $request->name,
    ]);

    return redirect()->route('admin.schoolclass.index')
        ->with('success', 'Class updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */


public function destroy($id)
{
    $class = SchoolClass::findOrFail($id);

    $class->delete();

    return redirect()->route('admin.schoolclass.index')
        ->with('success', 'Class deleted successfully.');
}

}
