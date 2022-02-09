<?php

use App\Http\Controllers\Backend\User\UserController;


Route::get('users', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
