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

Auth::routes();
Auth::routes(['verify' => false]);
Auth::routes(['reset' => false]);
// Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index');

Route::get('/vouchers', 'Voucher\VoucherController@index')->name('myVouchers');
Route::get('/vouchers/{id}', 'Voucher\VoucherController@show')->name('showVoucher');
Route::get('/vouchers/create', 'Voucher\VoucherController@create')->name('generate');
Route::post('/vouchers', 'Voucher\VoucherController@store');
Route::get('/vouchers/{id}/demo', 'Voucher\VoucherController@demo')->name('demo');
Route::get('/voucher/{id}/redeem', 'Voucher\VoucherController@redeem')->name('redeem');









