<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ExamType;
class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $examTypes = ExamType::paginate(10);
        return view('admin.exam_type.index', compact('examTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.exam_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|boolean',
    ]);

    ExamType::create($request->only('name', 'description', 'status'));

    return redirect()->route('admin.exam_type.index')
                     ->with('success', 'Exam type created successfully!');
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
        $examType = ExamType::findOrFail($id);
        return view('admin.exam_type.edit', compact('examType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ]);

        $examType = ExamType::findOrFail($id);
        $examType->update($request->only('name', 'description', 'status'));

        return redirect()->route('admin.exam_type.index')
                         ->with('success', 'Exam type updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $examType = ExamType::findOrFail($id);
        $examType->delete();

        return redirect()->route('admin.exam_type.index')
                         ->with('success', 'Exam type deleted successfully!');
    }
}