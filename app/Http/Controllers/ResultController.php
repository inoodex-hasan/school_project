<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\ExamType;

use Illuminate\Http\Request;

class ResultController extends Controller
{

      public function getSections($classId)
    {
        return response()->json(
            Section::where('class_id', $classId)
                   ->select('id','name')
                   ->get()
        );
    }

      public function getStudents($classId, $sectionId)
    {
        return response()->json(
            Student::where('class_id', $classId)
                   ->where('section_id', $sectionId)
                   ->select('id','name','roll')
                   ->get()
        );
    }
public function index(Request $request)
{
    $classes = SchoolClass::all();
    $results = Result::with('student');
    $resultrs = Result::with('examType');

if ($request->filled('exam_year')) {
    $results->where('exam_year', $request->exam_year);
}


    if ($request->filled('class_id')) {
        $results->whereHas('student', function ($q) use ($request) {
            $q->where('class_id', $request->class_id);
        });
    }

    if ($request->filled('section_id')) {
        $results->whereHas('student', function ($q) use ($request) {
            $q->where('section_id', $request->section_id);
        });
    }

    $results = $results->paginate(10);

    return view('admin.result.index', compact('results', 'classes'));
}

public function create()
{
    $examTypes = ExamType::where('status', 1)->get();
    $classes   = SchoolClass::orderBy('created_at', 'asc')->get();
    $students  = Student::all();
    return view('admin.result.create', compact('examTypes', 'students', 'classes'));
}


public function store(Request $request)
{
    $validated = $request->validate([
        'student_id'   => 'required|exists:students,id',
        'exam_type_id' => 'required|exists:exam_types,id',
        'exam_year'    => 'required|integer|between:2000,' . date('Y'),
        'grade'        => 'required|in:A+,A,A-,B+,B,B-,C+,C,C-,D,F',
    ]);

    Result::create($validated);

    return redirect()->route('admin.result.index')
                     ->with('success', 'Result added successfully.');
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'grade' => 'required|string|max:2',
        ]);

        $result = Result::findOrFail($id);
        $result->update([
            'grade' => $request->grade,
        ]);

        return redirect()->route('admin.result.index')
            ->with('success', 'Result updated successfully!');
    }

    public function destroy($id)
    {
        $result = Result::findOrFail($id);
        $result->delete();

        return redirect()->route('admin.result.index')
            ->with('success', 'Result deleted successfully!');
    }

public function edit($id)
{
    $result = Result::findOrFail($id);
    $students = Student::all();
    return view('admin.result.edit', compact('result', 'students'));
}


}