<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

use Illuminate\Support\Facades\Storage;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'event_date' => 'required|date',
        'photo' => 'required|image|max:2048',
    ]);

    $data = $request->only(['title', 'description', 'event_date']);

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('events', 'public');
    }

    Event::create($data);

    return redirect()->route('admin.events.index')
                     ->with('success', 'Event created successfully.');
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
 public function edit($id)
{
    $event = Event::findOrFail($id);
    return view('admin.events.edit', compact('event'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'event_date' => 'required|date',
        'photo' => 'nullable|image|max:2048',
    ]);

    $event = Event::findOrFail($id);

    if ($request->hasFile('photo')) {
        // Delete old photo if exists
        if ($event->photo && Storage::disk('public')->exists($event->photo)) {
            Storage::disk('public')->delete($event->photo);
        }

        // Store new photo
        $validated['photo'] = $request->file('photo')->store('events', 'public');
    }

    $event->update($validated);

    return redirect()->route('admin.events.index')
        ->with('success', 'Event updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
    {   
        $event = Event::findOrFail($id);

        if ($event->photo && Storage::disk('public')->exists($event->photo)) {
            Storage::disk('public')->delete($event->photo);
        }

        $event->delete();

        return redirect()->route('admin.events.index')
                         ->with('success', 'Event deleted successfully.');
    }
}
