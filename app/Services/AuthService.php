<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data)
    {
        try {
            $data['password'] = Hash::make($data['password']);

            $user = $this->userRepository->create($data);

            event(new Registered($user));

            Auth::guard()->login($user);

            flashSuccessSession('You have registered successfully!');

            return redirect('/home');
        } catch (\Exception $exception) {
            Log::error($exception);

            flashErrorSession('Something went wrong!');

            return redirect()->back();
        }
    }

    public function login(array $data)
    {
        try {
            if (Auth::guard()->attempt($data)) {
                session()->regenerate();

                flashSuccessSession('You logged successfully!');

                return redirect('/home');
            }

            flashErrorSession('Your credentials is not correct!');

            return redirect()->back();
        } catch (\Exception $exception) {
            Log::error($exception);

            flashErrorSession('Something went wrong!');

            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
