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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/address', function () {
    return view('address');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/check_postcode/{postcode}', 'Auth\RegisterController@check_postcode')->name('check_postcode');

// use App\Mail\WelcomeEMail;
// use Illuminate\Support\Facades\Mail;
// Route::get('/welcome/email', function () {
//   //  return new WelcomeEMail();
//     Mail::to('samaa.milano@hotmail.com')->send(new WelcomeEMail());
// });
