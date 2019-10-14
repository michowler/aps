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

//=====Example:
// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');
// Route::get('/about', 'PagesController@about')->name('about');
// Now you can use it in any page to refer them. like in contact page

// <html>
// ..
// ....
// <a href="{{route('welcome')}}">Home</a>
// <a href="{{route('about')}}">About</a>


// Michelle 
Auth::routes();
Auth::routes(['verify' => false]);
Auth::routes(['reset' => false]);
// Auth::routes(['register' => false]);

// Michelle 
Route::get('/', 'Voucher\VoucherController@index');
Route::get('/vouchers', 'Voucher\VoucherController@index')->name('myVouchers');
Route::get('/vouchers/create', 'Voucher\VoucherController@create')->name('generate');
Route::get('/vouchers/show/{id}', 'Voucher\VoucherController@show')->name('showVoucher');
Route::post('/vouchers', 'Voucher\VoucherController@store');
Route::get('/vouchers/demo/{id}', 'Voucher\VoucherController@demo')->name('demo');
Route::get('/voucher/redeem/{id}', 'Voucher\VoucherController@redeem')->name('redeem');

// Ying Ying 
Route::get('/upgrade', 'plan\planController@index');
Route::get('/create','plan\planController@checkout');
Route::get('/','Survey\SurveyController@surveyList');
Route::get('/chart','Survey\SurveyController@showChart');
Route::post('store','plan\planController@store');


// Alice








