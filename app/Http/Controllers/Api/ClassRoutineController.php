<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\ClassRoutine;

class ClassRoutineController extends Controller
{
    /**
     * Display a listing of class routines.
     */
    public function index(Request $request): JsonResponse
    {
        $query = ClassRoutine::with(['class', 'section', 'subject']);

        if ($request->filled('class_id')) {
            $query->where('class_id', $request->class_id);
        }

        if ($request->filled('day_of_week')) {
            $query->where('day_of_week', $request->day_of_week);
        }

        $routines = $query->orderBy('day_of_week')->orderBy('start_time')->get();

        return response()->json([
            'success' => true,
            'data' => $routines,
        ]);
    }

    /**
     * Display the specified class routine.
     */
    public function show($id): JsonResponse
    {
        $routine = ClassRoutine::with(['class', 'section', 'subject'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $routine,
        ]);
    }

    /**
     * Store a newly created class routine.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'subject_id' => 'required|exists:subjects,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'room' => 'nullable|string',
        ]);

        $routine = ClassRoutine::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Class routine created successfully',
            'data' => $routine->load(['class', 'section', 'subject']),
        ], 201);
    }

    /**
     * Update the specified class routine.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $routine = ClassRoutine::findOrFail($id);

        $validated = $request->validate([
            'class_id' => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'subject_id' => 'required|exists:subjects,id',
            'day_of_week' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'room' => 'nullable|string',
        ]);

        $routine->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Class routine updated successfully',
            'data' => $routine->load(['class', 'section', 'subject']),
        ]);
    }

    /**
     * Remove the specified class routine.
     */
    public function destroy($id): JsonResponse
    {
        $routine = ClassRoutine::findOrFail($id);
        $routine->delete();

        return response()->json([
            'success' => true,
            'message' => 'Class routine deleted successfully',
        ]);
    }
}
