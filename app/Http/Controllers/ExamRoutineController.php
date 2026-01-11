<?php

namespace App\Http\Controllers;

use App\Models\ExamRoutine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamRoutineController extends Controller
{
    public function index()
    {
        $routines = ExamRoutine::latest()->get();
        return view('admin.exam_routine.index', compact('routines'));
    }

     public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'file'  => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('file')->store('exam_routine', 'public');

        ExamRoutine::create([
            'title' => $request->title,
            'file'  => $path,
        ]);

        return redirect()->back()->with('success', 'Exam routine uploaded!');
    }

    public function destroy($id)
    {
        $routine = ExamRoutine::findOrFail($id);

        
        Storage::disk('public')->delete($routine->file);

        
        $routine->delete();

        return redirect()->back()->with('success', 'Exam routine deleted!');
    }

    public function create(){
        return view('admin.exam_routine.create');
        
    }

}