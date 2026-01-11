<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;

use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        // Search by name or roll
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('roll', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by ID
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        if ($request->filled('class_id')) {
            $query->where('class_id', $request->class_id);
        }

        if ($request->filled('section_id')) {
            $query->where('section_id', $request->section_id);
        }
        $classes  = SchoolClass::orderBy('created_at', 'asc')->get();
        $sections = Section::orderBy('name')->get();

        $students = $query->latest()->get();

        return view('admin.students.index', compact('students', 'classes', 'sections'));
    }

    public function create()
    {
        $classes  = SchoolClass::orderBy('created_at', 'asc')->get();
        $sections = Section::orderBy('name')->get();


        return view('admin.students.create', compact('classes', 'sections'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'class_id'   => 'required|exists:classes,id',
            'section_id' => 'required|exists:sections,id',
            'roll'       => 'required|string|max:50',
            'photo'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('students', 'public');
        }

        // Create student
        Student::create($validated);

        return redirect()->route('admin.students.index')->with('success', 'Student created successfully!');
    }


    public function edit($id)
    {
        $student = Student::findOrFail($id);


        $classes = SchoolClass::orderBy('created_at', 'asc')->get();


        $sections = Section::where('class_id', $student->class_id)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.students.edit', compact('student', 'classes', 'sections'));
    }


    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'class_id'   => 'required|string|max:50',
            'section_id' => 'nullable|string|max:50',
            'roll'    => 'required|string|max:50|unique:students,roll,' . $student->id,
            'photo'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($student->photo && Storage::disk('public')->exists($student->photo)) {
                Storage::disk('public')->delete($student->photo);
            }
            $validated['photo'] = $request->file('photo')->store('students/photos', 'public');
        }

        $student->update($validated);

        return redirect()->route('admin.students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->photo && Storage::disk('public')->exists($student->photo)) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->delete();

        return redirect()->route('admin.students.index')
            ->with('success', 'Student deleted successfully.');
    }

    public function getSections($classId)
    {
        $sections = Section::where('class_id', $classId)->get();
        return response()->json($sections);
    }
}
