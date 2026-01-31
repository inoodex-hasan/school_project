<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    /**
     * Display a listing of notices.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Notice::where('is_active', true);

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $notices = $query->orderBy('publish_date', 'desc')->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $notices,
        ]);
    }

    /**
     * Display the specified notice.
     */
    public function show($id): JsonResponse
    {
        $notice = Notice::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $notice,
        ]);
    }

    /**
     * Store a newly created notice.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'type' => 'nullable|string',
            'publish_date' => 'nullable|date',
            'is_active' => 'nullable|boolean',
        ]);

        $notice = Notice::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Notice created successfully',
            'data' => $notice,
        ], 201);
    }

    /**
     * Update the specified notice.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $notice = Notice::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'type' => 'nullable|string',
            'publish_date' => 'nullable|date',
            'is_active' => 'nullable|boolean',
        ]);

        $notice->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Notice updated successfully',
            'data' => $notice,
        ]);
    }

    /**
     * Remove the specified notice.
     */
    public function destroy($id): JsonResponse
    {
        $notice = Notice::findOrFail($id);
        $notice->delete();

        return response()->json([
            'success' => true,
            'message' => 'Notice deleted successfully',
        ]);
    }
}
