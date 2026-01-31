<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Result;

class ResultController extends Controller
{
    /**
     * Display a listing of results.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Result::with(['student', 'examType']);

        if ($request->filled('exam_year')) {
            $query->where('exam_year', $request->exam_year);
        }

        if ($request->filled('class_id')) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('class_id', $request->class_id);
            });
        }

        if ($request->filled('student_id')) {
            $query->where('student_id', $request->student_id);
        }

        $results = $query->orderBy('created_at', 'desc')->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $results,
        ]);
    }

    /**
     * Display the specified result.
     */
    public function show($id): JsonResponse
    {
        $result = Result::with(['student', 'examType'])->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $result,
        ]);
    }

    /**
     * Store a newly created result.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'exam_type_id' => 'required|exists:exam_types,id',
            'exam_year' => 'required|integer|between:2000,' . date('Y'),
            'grade' => 'required|in:A+,A,A-,B+,B,B-,C+,C,C-,D,F',
        ]);

        $result = Result::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Result created successfully',
            'data' => $result->load(['student', 'examType']),
        ], 201);
    }

    /**
     * Update the specified result.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $result = Result::findOrFail($id);

        $validated = $request->validate([
            'grade' => 'required|in:A+,A,A-,B+,B,B-,C+,C,C-,D,F',
        ]);

        $result->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Result updated successfully',
            'data' => $result->load(['student', 'examType']),
        ]);
    }

    /**
     * Remove the specified result.
     */
    public function destroy($id): JsonResponse
    {
        $result = Result::findOrFail($id);
        $result->delete();

        return response()->json([
            'success' => true,
            'message' => 'Result deleted successfully',
        ]);
    }
}
