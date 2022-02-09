<?php
/**
 * User: kholoudElkholy
 * Email: kholoudelkholy91@gmail.com
 */

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\CreatingUserService;

class UserController extends Controller
{
    /**
     * Return Register view
     * @return mixed
     */
    public function create(){
        return view('register');
    }

    /**
     * @param StoreUserRequest $request
     * @param CreatingUserService $service
     * @return mixed
     */
    public function store( StoreUserRequest $request,
                           CreatingUserService $service){

        $user_saved = $service->execute($request->all());

        if ($user_saved) {
            return redirect()->back()->with('success', 'Your account has been added!');
        }
        return redirect()->back()->with('error', 'Something went wrong, please try again later!');
    }
}
