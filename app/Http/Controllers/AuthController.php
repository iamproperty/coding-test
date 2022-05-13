<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegistrationRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    /**
     * @var AuthService
     */
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(UserRegistrationRequest $request)
    {
        return $this->authService->register($request->validated());
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login()
    {
        dd('login');
    }
}
