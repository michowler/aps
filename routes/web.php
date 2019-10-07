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

Auth::routes();
Auth::routes(['verify' => false]);
Auth::routes(['reset' => false]);
// Auth::routes(['register' => false]);

// Route::get('/registration/merchant', function () {
//     return view('auth/merchantRegistration');
// })->name('registration');

Route::get('/', 'HomeController@index');


// Route::get('/', function () {
//     return view('adminProfile');
// });




