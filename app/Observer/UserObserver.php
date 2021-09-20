<?php

namespace App\Observer;

use App\User;
use App\Mail\UserWelcomeMail;
use Illuminate\Support\Facades\Mail;

class UserObserver
{
    public function creating(User $user)
    {

        $name = $user->name;
        $email = $user->email;

        Mail::to($email)->send(new UserWelcomeMail($name));

    }
}
