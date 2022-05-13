<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
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
}
