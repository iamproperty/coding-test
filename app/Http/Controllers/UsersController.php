<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoringUserRequest;
use App\Services\CreatingUserService;

class UsersController extends Controller {

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoringUserRequestRequest  $request
     * @param  CreatingUserService  $service
     * @return \Illuminate\Http\Response
     */
    public function store(
            StoringUserRequest $request,
            CreatingUserService $service
    ) {
        $user_saved = $service->execute($request->validated());
        if ($user_saved) {
            return back()->with('success', 'Your account has been added!');
        }
        return back()->with('error', 'Something went wrong, please try again later!');
    }

}
