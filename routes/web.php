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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', 'AuthController@registerForm')->name('register');
Route::post('/register', 'AuthController@register')->name('register');

Route::get('/login', 'AuthController@showLoginForm')->name('login');
Route::post('/login', 'AuthController@login')->name('login');

Route::post('/logout', 'AuthController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/address', function () {
    return view('address');
});
