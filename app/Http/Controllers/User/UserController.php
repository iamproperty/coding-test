<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\StoreUserRequest;
use App\Services\users\StoringUserService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class UserController
 * @package App\Http\Controllers
 * @author Ahmed Helal Ahmed
 */
class UserController
{
    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * @param StoreUserRequest $storeUserRequest
     * @param StoringUserService $storingUserService
     * @return RedirectResponse
     */
    public function store(
        StoreUserRequest $storeUserRequest,
        StoringUserService $storingUserService
    ): RedirectResponse {

        if ($storingUserService->execute($storeUserRequest->validated())) {
            return back()->with('success', 'You registered successfully');
        }

        return back()->with('error', 'Something went wrong. please try again later!');
    }
}
