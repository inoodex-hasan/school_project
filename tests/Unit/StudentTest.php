<?php

namespace Tests\Unit;

use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Result;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    protected SchoolClass $class;
    protected Section $section;

    protected function setUp(): void
    {
        parent::setUp();

        $this->class = SchoolClass::factory()->create(['name' => 'Class 10']);
        $this->section = Section::factory()->create([
            'name' => 'Section A',
            'class_id' => $this->class->id,
        ]);
    }

    public function test_student_belongs_to_class(): void
    {
        $student = Student::factory()->create([
            'name' => 'John Doe',
            'class_id' => $this->class->id,
            'section_id' => $this->section->id,
            'roll' => '001',
        ]);

        $this->assertInstanceOf(SchoolClass::class, $student->class);
        $this->assertEquals('Class 10', $student->class->name);
    }

    public function test_student_belongs_to_section(): void
    {
        $student = Student::factory()->create([
            'name' => 'John Doe',
            'class_id' => $this->class->id,
            'section_id' => $this->section->id,
            'roll' => '001',
        ]);

        $this->assertInstanceOf(Section::class, $student->section);
        $this->assertEquals('Section A', $student->section->name);
    }

    public function test_student_can_have_results(): void
    {
        $student = Student::factory()->create([
            'name' => 'John Doe',
            'class_id' => $this->class->id,
            'section_id' => $this->section->id,
            'roll' => '001',
        ]);

        $result = Result::factory()->create([
            'student_id' => $student->id,
            'grade' => 'A+',
        ]);

        $this->assertInstanceOf(Result::class, $student->results->first());
        $this->assertEquals('A+', $student->results->first()->grade);
    }

    public function test_student_fillable_attributes(): void
    {
        $student = new Student();
        $fillable = $student->getFillable();

        $this->assertContains('name', $fillable);
        $this->assertContains('class_id', $fillable);
        $this->assertContains('section_id', $fillable);
        $this->assertContains('roll', $fillable);
        $this->assertContains('photo', $fillable);
    }

    public function test_student_soft_deletes(): void
    {
        $student = Student::factory()->create([
            'name' => 'John Doe',
            'class_id' => $this->class->id,
            'section_id' => $this->section->id,
            'roll' => '001',
        ]);

        $student->delete();

        $this->assertSoftDeleted($student);
        $this->assertCount(0, Student::all());
        $this->assertCount(1, Student::withTrashed()->get());
    }

    public function test_student_search_by_name(): void
    {
        Student::factory()->create([
            'name' => 'John Doe',
            'class_id' => $this->class->id,
            'section_id' => $this->section->id,
            'roll' => '001',
        ]);

        Student::factory()->create([
            'name' => 'Jane Smith',
            'class_id' => $this->class->id,
            'section_id' => $this->section->id,
            'roll' => '002',
        ]);

        $results = Student::where('name', 'like', '%John%')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('John Doe', $results->first()->name);
    }

    public function test_student_search_by_roll(): void
    {
        Student::factory()->create([
            'name' => 'John Doe',
            'class_id' => $this->class->id,
            'section_id' => $this->section->id,
            'roll' => '001',
        ]);

        Student::factory()->create([
            'name' => 'Jane Smith',
            'class_id' => $this->class->id,
            'section_id' => $this->section->id,
            'roll' => '002',
        ]);

        $results = Student::where('roll', 'like', '%001%')->get();

        $this->assertCount(1, $results);
        $this->assertEquals('001', $results->first()->roll);
    }
}
