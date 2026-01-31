<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;

class StudentController extends Controller
{
    /**
     * Display a listing of students.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Student::with(['class', 'section']);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('roll', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('class_id')) {
            $query->where('class_id', $request->class_id);
        }

        if ($request->filled('section_id')) {
            $query->where('section_id', $request->section_id);
        }

        $students = $query->orderBy('created_at', 'desc')->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $students,
        ]);
    }

    /**
     * Display the specified student.
     */
    public function show($id): JsonResponse
    {
        $student = Student::with(['class', 'section', 'results', 'admission'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $student,
        ]);
    }

    /**
     * Store a newly created student.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'roll' => 'required|string|max:50|unique:students,roll',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $student = Student::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Student created successfully',
            'data' => $student->load(['class', 'section']),
        ], 201);
    }

    /**
     * Update the specified student.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'roll' => 'required|string|max:50|unique:students,roll,' . $student->id,
        ]);

        $student->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Student updated successfully',
            'data' => $student->load(['class', 'section']),
        ]);
    }

    /**
     * Remove the specified student.
     */
    public function destroy($id): JsonResponse
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json([
            'success' => true,
            'message' => 'Student deleted successfully',
        ]);
    }
}
