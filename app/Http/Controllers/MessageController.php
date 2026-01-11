<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{

  public function index()
{
    $messages = Message::latest()->get();
    return view('admin.messages.index', compact('messages'));
}

    public function create()
    {
        return view('admin.messages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'nullable|string',
            'type'    => 'required|in:Principal,Vice Principal,Head Master,Head Mistress,Director,Managing Director,Chairman,Co Chairman',
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('messages/photos', 'public');    
        }

        Message::create([
            'title'   => $request->title,
            'content' => $request->content,
            'type'    => $request->type,
            'photo'   => $path,
        ]);

        return redirect()
            ->route('admin.messages.index')
            ->with('success', ucfirst($request->type) . ' message created successfully!');
    }

public function edit($id)
{
    $message = Message::findOrFail($id);
    return view('admin.messages.edit', compact('message'));
}

public function update(Request $request, $id)
{
    $message = Message::findOrFail($id);

    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'nullable|string',
        'type'    => 'required|in:Principal,Vice Principal,Head Master,Head Mistress,Director,Managing Director,Chairman,Co Chairman',
        'photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = $request->only(['title','content','type']);

    if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->store('messages/photos', 'public');
    }

    $message->update($data);

    return redirect()
        ->route('admin.messages.index')
        ->with('success', ucfirst($request->type) . ' message updated successfully!');
}


    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.messages.show', compact('message'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        // delete photo if exists
        if ($message->photo && Storage::disk('public')->exists($message->photo)) {
            Storage::disk('public')->delete($message->photo);
        }

        $message->delete();

        return redirect()
            ->route('admin.messages.index')
            ->with('success', 'Message deleted successfully!');
    }
}