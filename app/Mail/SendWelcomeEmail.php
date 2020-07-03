<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendWelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Welcome to ' . config('app.name'))
            ->markdown('mail.welcome');
    }
}
