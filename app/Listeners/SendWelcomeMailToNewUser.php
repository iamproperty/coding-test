<?php

namespace App\Listeners;

use App\Mail\WelcomeNewUser;
use Illuminate\Support\Facades\Mail;

class SendWelcomeMailToNewUser
{

    /**
     * Handle the registered event
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     * @return void
     */

    public function handle($event)
    {
        Mail::to($event->user->email)->send(new WelcomeNewUser($event->user));
    }
}
