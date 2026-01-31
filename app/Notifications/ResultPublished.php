<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResultPublished extends Notification
{
    use Queueable;

    protected $result;
    protected $student;

    /**
     * Create a new notification instance.
     */
    public function __construct($result, $student)
    {
        $this->result = $result;
        $this->student = $student;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Result Published: ' . $this->result->examType->name . ' ' . $this->result->exam_year)
            ->line('Your result for ' . $this->result->examType->name . ' has been published.')
            ->line('Student: ' . $this->student->name)
            ->line('Class: ' . $this->student->class->name)
            ->line('Roll: ' . $this->student->roll)
            ->line('Grade: ' . $this->result->grade)
            ->action('View Result', url('/admin/results/' . $this->result->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'result_id' => $this->result->id,
            'student_id' => $this->student->id,
            'exam_type' => $this->result->examType->name,
            'exam_year' => $this->result->exam_year,
            'grade' => $this->result->grade,
            'message' => 'Result published for ' . $this->student->name . ': Grade ' . $this->result->grade,
        ];
    }
}
