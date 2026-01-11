<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admission\AdmissionCreateRequest;
use App\Models\Admission;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Start query
        $query = Admission::with(['student', 'student.class', 'student.section']);

        //  Search by admission name OR student roll
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhereHas('student', function ($q2) use ($search) {
                        $q2->where('roll', 'like', "%{$search}%");
                    });
            });
        }

        // Filter by admission ID
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        // Filter by class
        if ($request->filled('class_id')) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('class_id', $request->class_id);
            });
        }

        // Filter by section
        if ($request->filled('section_id')) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('section_id', $request->section_id);
            });
        }

        //  FINAL RESULT
        $students = $query->latest()->get();

        return view('admin.admission.index', compact('students'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes  = SchoolClass::orderBy('created_at', 'asc')->get();
        $sections = Section::orderBy('name')->get();
        return view('admin.admission.create', compact('classes', 'sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdmissionCreateRequest $request)
    {
        DB::transaction(function () use ($request) {

            // Handle file uploads
            $fatherImagePath = $request->file('father_image')
                ? $request->file('father_image')->store('students/father', 'public')
                : null;

            $motherImagePath = $request->file('mother_image')
                ? $request->file('mother_image')->store('students/mother', 'public')
                : null;

            $studentPhotoPath = $request->file('photo')
                ? $request->file('photo')->store('students/photo', 'public')
                : null;

            // Create Student
            $student = Student::create([
                'name' => $request->name,
                'class_id' => $request->class_id,
                'section_id' => $request->section_id,
                'roll' => $request->roll,
                'photo' => $studentPhotoPath,
            ]);

            // Create Admission
            Admission::create([
                'student_id' => $student->id,
                'name' => $request->name,
                'email' => $request->email,
                'father_image' => $fatherImagePath,
                'mother_image' => $motherImagePath,
                'birth_certificate_no' => $request->birth_certificate_no,
                'religion' => $request->religion,
                'nationality' => $request->nationality ?? 'Bangladesh',
                'phone' => $request->phone,
                'address' => $request->address,
                'fathers_name' => $request->fathers_name,
                'mothers_name' => $request->mothers_name,
                'gender' => $request->gender,
                'dob' => $request->date_of_birth,
                'blood_group' => $request->blood_group,
                'year' => now()->year,
            ]);
        });

        return redirect()->back()->with('success', 'Admission submitted successfully!');
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
    public function edit(Admission $admission)
    {
        $admission->load('student');

        $classes = SchoolClass::all();
        $sections = Section::all();

        return view('admin.admission.edit', compact('admission', 'classes', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
 public function update(AdmissionCreateRequest $request, $id)
{
    DB::transaction(function () use ($request, $id) {

        $admission = Admission::findOrFail($id);
        $student   = Student::findOrFail($admission->student_id);

        /* FILE UPLOADS (OPTIONAL) */

        $fatherImagePath = $request->file('father_image')
            ? $request->file('father_image')->store('students/father', 'public')
            : $admission->father_image;

        $motherImagePath = $request->file('mother_image')
            ? $request->file('mother_image')->store('students/mother', 'public')
            : $admission->mother_image;

        $studentPhotoPath = $request->file('photo')
            ? $request->file('photo')->store('students/photo', 'public')
            : $student->photo;

        /* UPDATE STUDENT*/

        $student->update([
            'name'       => $request->name,
            'class_id'   => $request->class_id,
            'section_id' => $request->section_id,
            'roll'       => $request->roll,
            'photo'      => $studentPhotoPath,
        ]);

        /* UPDATE ADMISSION */

        $admission->update([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'father_image'          => $fatherImagePath,
            'mother_image'          => $motherImagePath,
            'birth_certificate_no'  => $request->birth_certificate_no,
            'religion'              => $request->religion,
            'nationality'           => $request->nationality ?? 'Bangladesh',
            'phone'                 => $request->phone,
            'address'               => $request->address,
            'fathers_name'          => $request->fathers_name,
            'mothers_name'          => $request->mothers_name,
            'gender'                => $request->gender,
            'dob'                   => $request->date_of_birth,
            'blood_group'           => $request->blood_group,
        ]);
    });

    return redirect()
        ->route('admin.admission.index')
        ->with('success', 'Admission updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    DB::transaction(function () use ($id) {
        $admission = Admission::findOrFail($id);
        $student   = Student::findOrFail($admission->student_id);

        // Delete uploaded files if exist
        if ($admission->father_image && Storage::disk('public')->exists($admission->father_image)) {
            Storage::disk('public')->delete($admission->father_image);
        }

        if ($admission->mother_image && Storage::disk('public')->exists($admission->mother_image)) {
            Storage::disk('public')->delete($admission->mother_image);
        }

        if ($student->photo && Storage::disk('public')->exists($student->photo)) {
            Storage::disk('public')->delete($student->photo);
        }

        // Delete student first
        $student->delete();

        // Then delete admission
        $admission->delete();
    });

    return redirect()
        ->route('admin.admission.index')
        ->with('success', 'Admission and student deleted successfully!');
}
}
