<?php

namespace App\Listeners;

use App\Jobs\ProcessWelcomeRegisteredUser;

class SendWelcomeEmailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        dispatch(new ProcessWelcomeRegisteredUser($event->user));
    }
}
