<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\UserSavingService;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

/**
 * Description of UserController
 *
 * @author Mohamed Shehata<m.shehata.alex@gmail.com>
 */
class UserController extends Controller
{
    /**
     * Display Form for creating new user.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(\App\Services\UserCountingService $countingService)
    {
        $userCount = $countingService->execute();
        return View::make('users.create', compact('userCount'));
    }

    /**
     * Store new user in storage system.
     *
     * @param StoreUserRequest  $request
     * @param UserSavingService $savingService
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(
        StoreUserRequest $request,
        UserSavingService $savingService
    )
    {
        try {
            $savingService->execute($request->validated());
            return redirect()->back()->with('success', __('messages.user.create_success'));
        } catch (Exception $exc) {
            Log::alert('Failed to store user', [
                'error_message' => $exc->getMessage()
            ]);
        }
        return redirect()->back()->with('error', __('messages.user.create_failed'));
    }
}
