<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Mail\WelcomeEMail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'postcode' => $data['postcode'],
            'password' => Hash::make($data['password']),
        ]);
    }


     // overide  of registered function
    protected function registered(Request $request, $user)
   {
       Mail::to($user->email)->send(new WelcomeEMail());
   }


     // function to check the availablity of user post code

    protected function check_postcode($postcode)
    {

       $api_base_url ='https://api.postcodes.io/postcodes/'; // api base url

      // creat instance of Guzzle lib.
       $client = new \GuzzleHttp\Client(['base_uri' => $api_base_url,'verify' => false]);  // https check disabled.

      //send get request to check postcode availablity.
       $result = $client->request('GET', $postcode, ['http_errors' => false]);

      $status = $result->getStatusCode();              // status of request 200-> ok 404->notfound
      /*
      $body = $result->getBody();                      // body of  request
      $json_data = json_decode($body->getContents());  // api data in json formate
      */

      return $status;
    }
}
