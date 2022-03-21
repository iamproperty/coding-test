<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    protected function create(Request $request)
    {
        $validatePostCode = self::validatePostCode($request['postcode']);
        $pieces_validatePostCode = trim($validatePostCode, "}");
        $pieces_validatePostCode = explode(",", $pieces_validatePostCode);
        if($pieces_validatePostCode[1] == '"result":false'){
            return 'Not a valid postal code';
        }
        $validated = User::validate($request);
        if($validated){
            return $validated;
        }
        else {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'postcode' => $request['postcode'],
            ]);

            $email_data = array(
                'name' => $request['name'],
                'email' => $request['email'],
            );

            // send email with the template
            Mail::send('welcome_email', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'], $email_data['name'])
                    ->subject('Welcome to MyNotePaper')
                    ->from('info@mynotepaper.com', 'MyNotePaper');
            });

            return $user;
        }
    }

    public static function validatePostCode($postcode){
        $url = 'api.postcodes.io/postcodes/'.$postcode.'/validate';
        ob_start();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($ch);
    }
}
