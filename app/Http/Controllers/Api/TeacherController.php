<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of teachers.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Teacher::where('status', true);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $teachers = $query->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => $teachers,
        ]);
    }
}
