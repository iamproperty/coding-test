<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\User;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\PostcodeApi;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use function foo\func;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     * @throws ValidationException
     */
    protected function validator(array $data)
    {
        $validator= Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'postcode' => ['required', 'string']
        ]);
        try {
            $api = new PostcodeApi();
            $response = $api->validatePostcode($data['postcode']);
            return $validator;
        } catch (ClientException $e) {
            throw ValidationException::withMessages([
                        'postcode' => 'Postcode does not exist',
                    ]);

        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'postcode' => $data['postcode']
        ]);
    }

    public function register(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails()) {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $user = $this->create($request->all());
            //Email does not work
//            Mail::to($user->email)->send(new WelcomeMail());
            Auth::login($user);
            return redirect('/')->with(['message' => 'Account Successfully Created.']);
        }

    }


}
