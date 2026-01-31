<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StudentCreated extends Notification
{
    use Queueable;

    protected $student;

    /**
     * Create a new notification instance.
     */
    public function __construct($student)
    {
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
            ->subject('New Student Registration')
            ->line('A new student has been registered.')
            ->line('Student Name: ' . $this->student->name)
            ->line('Class: ' . $this->student->class->name)
            ->line('Roll: ' . $this->student->roll)
            ->action('View Student', url('/admin/students/' . $this->student->id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'student_id' => $this->student->id,
            'student_name' => $this->student->name,
            'class' => $this->student->class->name,
            'roll' => $this->student->roll,
            'message' => 'New student registered: ' . $this->student->name,
        ];
    }
}
