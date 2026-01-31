<?php

namespace Tests\Unit;

use App\Models\Result;
use App\Models\Student;
use App\Models\ExamType;
use App\Models\SchoolClass;
use App\Models\Section;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResultTest extends TestCase
{
    use RefreshDatabase;

    protected Student $student;
    protected ExamType $examType;

    protected function setUp(): void
    {
        parent::setUp();

        $class = SchoolClass::factory()->create(['name' => 'Class 10']);
        $section = Section::factory()->create([
            'name' => 'Section A',
            'class_id' => $class->id,
        ]);

        $this->student = Student::factory()->create([
            'name' => 'John Doe',
            'class_id' => $class->id,
            'section_id' => $section->id,
            'roll' => '001',
        ]);

        $this->examType = ExamType::factory()->create([
            'name' => 'Final Exam',
            'status' => 1,
        ]);
    }

    public function test_result_belongs_to_student(): void
    {
        $result = Result::factory()->create([
            'student_id' => $this->student->id,
            'exam_type_id' => $this->examType->id,
            'exam_year' => 2024,
            'grade' => 'A+',
        ]);

        $this->assertInstanceOf(Student::class, $result->student);
        $this->assertEquals('John Doe', $result->student->name);
    }

    public function test_result_belongs_to_exam_type(): void
    {
        $result = Result::factory()->create([
            'student_id' => $this->student->id,
            'exam_type_id' => $this->examType->id,
            'exam_year' => 2024,
            'grade' => 'A+',
        ]);

        $this->assertInstanceOf(ExamType::class, $result->examType);
        $this->assertEquals('Final Exam', $result->examType->name);
    }

    public function test_result_fillable_attributes(): void
    {
        $result = new Result();
        $fillable = $result->getFillable();

        $this->assertContains('student_id', $fillable);
        $this->assertContains('exam_type_id', $fillable);
        $this->assertContains('exam_year', $fillable);
        $this->assertContains('grade', $fillable);
    }

    public function test_result_soft_deletes(): void
    {
        $result = Result::factory()->create([
            'student_id' => $this->student->id,
            'exam_type_id' => $this->examType->id,
            'exam_year' => 2024,
            'grade' => 'A+',
        ]);

        $result->delete();

        $this->assertSoftDeleted($result);
        $this->assertCount(0, Result::all());
        $this->assertCount(1, Result::withTrashed()->get());
    }

    public function test_result_filter_by_exam_year(): void
    {
        Result::factory()->create([
            'student_id' => $this->student->id,
            'exam_type_id' => $this->examType->id,
            'exam_year' => 2024,
            'grade' => 'A+',
        ]);

        Result::factory()->create([
            'student_id' => $this->student->id,
            'exam_type_id' => $this->examType->id,
            'exam_year' => 2023,
            'grade' => 'A',
        ]);

        $results2024 = Result::where('exam_year', 2024)->get();
        $results2023 = Result::where('exam_year', 2023)->get();

        $this->assertCount(1, $results2024);
        $this->assertEquals('A+', $results2024->first()->grade);

        $this->assertCount(1, $results2023);
        $this->assertEquals('A', $results2023->first()->grade);
    }

    public function test_result_filter_by_grade(): void
    {
        Result::factory()->create([
            'student_id' => $this->student->id,
            'exam_type_id' => $this->examType->id,
            'exam_year' => 2024,
            'grade' => 'A+',
        ]);

        Result::factory()->create([
            'student_id' => $this->student->id,
            'exam_type_id' => $this->examType->id,
            'exam_year' => 2024,
            'grade' => 'B',
        ]);

        $resultsA = Result::where('grade', 'A+')->get();

        $this->assertCount(1, $resultsA);
        $this->assertEquals('A+', $resultsA->first()->grade);
    }

    public function test_valid_grades(): void
    {
        $validGrades = ['A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D', 'F'];

        foreach ($validGrades as $grade) {
            $result = Result::factory()->create([
                'student_id' => $this->student->id,
                'exam_type_id' => $this->examType->id,
                'exam_year' => 2024,
                'grade' => $grade,
            ]);

            $this->assertEquals($grade, $result->grade);
        }
    }
}
