<?php

namespace App\Http\Controllers;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
    public function send(Request $request)
    {
        Mail::to($request->user())->send(new WelcomeMail());
        echo "Email Sent with attachment. Check your inbox.";

    }


}
