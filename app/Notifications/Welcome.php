<?php

namespace App\Notifications;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class Welcome extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage|void
     */
    public function  toMail($notifiable)
    {
        try {
            return (new MailMessage)
                ->line('Welcome ' . $notifiable->name)
                ->line('Thank you for using our application!');
        } catch (Exception  $ex) {
            Log::error('Cannot send welcome email');
        }
    }
}
