<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Repository\user\UserStoreRepository;

class UserController extends Controller
{

    /**
     * UserStoreRepository
     *
     * @var UserStoreRepository $UserStoreRepository
     */
    private $UserStoreRepository;

    /**
     * __construct
     *
     * @param UserStoreRepository $UserStoreRepository
     */
    public function __construct(UserStoreRepository $UserStoreRepository)
    {
        $this->UserStoreRepository = $UserStoreRepository;
    }

    public function index()
    {
        return view('register');
    }

    public function store(UserStoreRequest $request)
    {
        $this->UserStoreRepository->createNewUser($request);
        return back()->with('success','User Created!');
    }
}
