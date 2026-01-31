<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of classes.
     */
    public function index(Request $request): JsonResponse
    {
        $classes = SchoolClass::with(['sections'])->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => $classes,
        ]);
    }
}
