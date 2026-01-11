<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\ClassRoutine;

use Illuminate\Support\Facades\Storage;

use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;



class ClassRoutineController extends Controller
{
public function index()
{
    $routines = ClassRoutine::with(['class', 'section', 'subject', 'teacher'])
        ->orderBy('class_id')
        ->orderBy('section_id')
        ->orderByRaw("FIELD(day,'Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday')")
        ->orderBy('start_time')
        ->get();

    return view('admin.class_routine.index', compact('routines'));
}



public function create()
{
    $classes = SchoolClass::all();  
    $subjects = Subject::all();    
    $teachers = Teacher::all();   

    return view('admin.class_routine.create', compact('classes',  'subjects', 'teachers'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'class_id' => 'required|exists:classes,id',
        'section_id' => 'required|exists:sections,id',
        'subject_id' => 'required|exists:subjects,id',
        'teacher_id' => 'required|exists:teachers,id',
        'day' => 'required|string',
        'start_time' => 'required',
        'end_time' => 'required',
    ]);

    ClassRoutine::create($validated);

    return redirect()->back()->with('success', 'Routine saved successfully!');
}

public function update(Request $request, $id)
{
   $validated = $request->validate([
        'class_id' => 'required|exists:classes,id',
        'section_id' => 'required|exists:sections,id',
        'subject_id' => 'required|exists:subjects,id',
        'teacher_id' => 'required|exists:teachers,id',
        'day' => 'required|string',
        'start_time' => 'required',
        'end_time' => 'required',
    ]);

    $routine = ClassRoutine::findOrFail($id);
    $routine->update($request->all());

    return redirect()->route('admin.class_routine.index')
                     ->with('success', 'Class Routine updated successfully.');
}

public function destroy($id)
{
    $routine = ClassRoutine::findOrFail($id);
    $routine->delete();

    return redirect()->route('admin.class_routine.index')
                     ->with('success', 'Class Routine deleted successfully.');
}

public function edit($id)
{
    $routine = ClassRoutine::findOrFail($id);
    $classes = SchoolClass::all();
    $sections = Section::where('class_id', $routine->class_id)->get(); // load only sections of current class
    $subjects = Subject::all();
    $teachers = Teacher::all();

    return view('admin.class_routine.edit', compact('routine', 'classes', 'sections', 'subjects', 'teachers'));
}

public function export(Request $request)
    {
        $classId = $request->class_id;
        $sectionId = $request->section_id;

        $routines = ClassRoutine::query()
            ->when($classId, fn($q) => $q->where('class_id', $classId))
            ->when($sectionId, fn($q) => $q->where('section_id', $sectionId))
            ->with(['subject', 'teacher'])
            ->get()
            ->groupBy('class_id');

        $pdf = Pdf::loadView('admin.class_routine.pdf', compact('routines'));
        return $pdf->download('class_routine.pdf');
    }

 public function upload()
    {
        return view('admin.class_routine.upload');
    }

    // Handle file upload
    public function storeUpload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('file')->store('class_routines', 'public');

        ClassRoutine::create([
            'title' => $request->title,
            'file' => $path,
        ]);

        return redirect()->route('admin.class_routine.upload')
                         ->with('success', 'Class routine uploaded successfully.');
    }

}