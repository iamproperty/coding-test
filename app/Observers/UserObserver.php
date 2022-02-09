<?php

namespace App\Observers;

use App\Models\User;
use App\Notifications\WelcomingEmail;
use Illuminate\Support\Facades\Log;

class UserObserver {

    /**
     * Handle the user "created" event.
     * @param User $user
     */
    public function created(User $user) {
        try {
            $user->notify(new WelcomingEmail);
        } catch (\Exception  $ex) {
            Log::error('Cannot send welcome email');
        }
    }
}