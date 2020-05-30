<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

    }

    protected function login(Request $request)
    {
        $validation = $this->validator($request->all());
        if ($validation->fails()) {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput();
        } else {
            $email = $request->input('email');
            $user = User::where('email', '=', $email)->first();
            if ($user) {
                if (password_verify($request->input('password'), $user->password)) {
                    // Success
                    Auth::login($user);
                    return redirect('/')->with(['message' => 'Logged in.']);
                } else {
                    return redirect()->back()->with(['password' => 'Password is incorrect']);

                }
            } else {
                return redirect()->back()->with(['message' => 'User not found']);
            }
        }

    }

    protected
    function logout(Request $request)
    {
        Auth::logout();
        print_r("LOGGING OUT");
        return redirect('/login');
    }
}
