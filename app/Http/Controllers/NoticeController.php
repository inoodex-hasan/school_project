<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
public function index()
{
    $notices = Notice::latest()->get();
    return view('admin.notices.index', compact('notices'));
}

    public function create()
    {
        return view('admin.notices.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
        ]);

        Notice::create($request->only(['title', 'content', 'status']));
        return redirect()->route('admin.notices.index')->with('success', 'Notice created successfully.');
    }

    public function manage()
{
    $notices = Notice::latest()->get();
    return view('admin.notices.manage', compact('notices'));
}
public function edit($id)
{
    $notice = Notice::findOrFail($id);
    return view('admin.notices.edit', compact('notice'));
}

public function update(Request $request, $id)
{
    $notice = Notice::findOrFail($id);

    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required',
    ]);

    $notice->update($request->only(['title', 'content', 'status']));
    return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully.');
}

public function destroy($id)
{
    Notice::findOrFail($id)->delete();
    return redirect()->route('admin.notices.index')->with('success', 'Notice deleted successfully.');
}

public function show($id)
{
    $notice = Notice::findOrFail($id);
    return view('admin.notices.show', compact('notice'));
}


}
