<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'pages.welcome');
Route::view('/address', 'pages.address');

Route::middleware('guest')->group(function () {
    Route::view('register', 'auth.register')->name('register');
});
