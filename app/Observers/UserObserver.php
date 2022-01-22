<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\WelcomingEmail;

class UserObserver {

    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user) {
        $user->notify(new WelcomingEmail);
    }

}
