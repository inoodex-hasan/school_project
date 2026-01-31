<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Display a listing of events.
     */
    public function index(Request $request): JsonResponse
    {
        $query = Event::where('is_active', true);

        if ($request->filled('start_date')) {
            $query->where('start_date', '>=', $request->start_date);
        }

        $events = $query->orderBy('start_date', 'asc')->paginate(15);

        return response()->json([
            'success' => true,
            'data' => $events,
        ]);
    }

    /**
     * Display the specified event.
     */
    public function show($id): JsonResponse
    {
        $event = Event::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $event,
        ]);
    }

    /**
     * Store a newly created event.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'location' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $event = Event::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Event created successfully',
            'data' => $event,
        ], 201);
    }

    /**
     * Update the specified event.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'location' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $event->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Event updated successfully',
            'data' => $event,
        ]);
    }

    /**
     * Remove the specified event.
     */
    public function destroy($id): JsonResponse
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully',
        ]);
    }
}
