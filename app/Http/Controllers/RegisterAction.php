<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeEmail;
use App\Rules\Postcode;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterAction extends Controller
{
    /** @var Guard */
    private Guard $guard;

    /**
     * RegisterAction constructor.
     * @param Guard $guard
     */
    public function __construct(Guard $guard)
    {
        $this->guard = $guard;
    }

    /**
     * @param Request $request
     * @param Mailer $mailer
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function __invoke(Request $request, Mailer $mailer)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'postcode' => ['required', new Postcode()],
        ]);
        $user = $this->createUser($data);
        $mailer->to($user)->queue(new SendWelcomeEmail($user));
        return redirect()->route('home');
    }

    /**
     * @param array $data
     * @return User
     */
    private function createUser($data = []): User
    {
        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }
}
