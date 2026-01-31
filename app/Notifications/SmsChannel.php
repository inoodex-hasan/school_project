<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class SmsChannel
{
    /**
     * Send the given notification.
     */
    public function send(object $notifiable, Notification $notification): void
    {
        $message = $notification->toSms($notifiable);

        // Log the SMS message
        // In production, you would integrate with a real SMS provider like Twilio, Nexmo, etc.
        \Log::info('SMS Notification', [
            'to' => $notifiable->phone ?? 'Unknown',
            'message' => $message,
            'notification' => get_class($notification),
        ]);

        // Store SMS in database for audit trail
        \App\Models\SmsLog::create([
            'phone' => $notifiable->phone,
            'message' => $message,
            'status' => 'pending',
            'notification_type' => get_class($notification),
        ]);
    }
}
