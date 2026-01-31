<?php

namespace Tests\Unit;

use App\Models\Student;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\Result;
use App\Models\ExamType;
use App\Notifications\StudentCreated;
use App\Notifications\ResultPublished;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class NotificationTest extends TestCase
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

    public function test_student_created_notification_can_be_sent(): void
    {
        Notification::fake();

        $notification = new StudentCreated($this->student);

        $this->student->notify($notification);

        Notification::assertSentTo(
            $this->student,
            StudentCreated::class
        );
    }

    public function test_student_created_notification_has_correct_data(): void
    {
        $notification = new StudentCreated($this->student);

        $mailData = $notification->toMail($this->student);

        $this->assertStringContainsString('New Student Registration', $mailData->subject);
        $this->assertStringContainsString($this->student->name, $mailData->subject);
    }

    public function test_result_published_notification_can_be_sent(): void
    {
        Notification::fake();

        $result = Result::factory()->create([
            'student_id' => $this->student->id,
            'exam_type_id' => $this->examType->id,
            'exam_year' => 2024,
            'grade' => 'A+',
        ]);

        $notification = new ResultPublished($result, $this->student);

        $this->student->notify($notification);

        Notification::assertSentTo(
            $this->student,
            ResultPublished::class
        );
    }

    public function test_result_published_notification_has_correct_data(): void
    {
        $result = Result::factory()->create([
            'student_id' => $this->student->id,
            'exam_type_id' => $this->examType->id,
            'exam_year' => 2024,
            'grade' => 'A+',
        ]);

        $notification = new ResultPublished($result, $this->student);

        $mailData = $notification->toMail($this->student);

        $this->assertStringContainsString('Result Published', $mailData->subject);
        $this->assertStringContainsString('A+', $mailData->subject);
    }

    public function test_notifications_can_be_stored_in_database(): void
    {
        Notification::fake();

        $notification = new StudentCreated($this->student);

        $this->student->notify($notification);

        $this->assertDatabaseCount('notifications', 1);
    }
}
