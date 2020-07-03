<?php

use App\Http\Controllers\RegisterAction;

Route::view('/', 'pages.welcome')->name('home');
Route::view('/address', 'pages.address');

Route::middleware('guest')->group(function () {
    Route::view('register', 'auth.register')->name('register.form');
    Route::post('register', RegisterAction::class)->name('register.store');
});
