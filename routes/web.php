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


// Michelle , Alice
Auth::routes();
Auth::routes(['verify' => false]);
Auth::routes(['reset' => false]);
// Auth::routes(['register' => false]);


// Michelle 
Route::get('/vouchers', 'Voucher\VoucherController@index')->name('myVouchers');
Route::get('/vouchers/create', 'Voucher\VoucherController@create')->name('generate');
Route::post('/vouchers', 'Voucher\VoucherController@store')->name('storeVoucher');
Route::get('/vouchers/show/{id}', 'Voucher\VoucherController@show')->name('showVoucher');
Route::get('/vouchers/demo/{id}', 'Voucher\VoucherController@demo')->name('demo');
Route::get('/voucher/redeem/{id}', 'Voucher\VoucherController@redeem')->name('redeem');
Route::get('/', function () {
    if(Auth::check()) {
        return redirect()->route('myVouchers');
    }
    return view('auth.login');
})->name('home');

// Route::group(['middleware' => 'web'], function () {
//     // Moving here will ensure that sessions, csrf, etc. is included in all these routes
//     Route::group(['prefix'=>'guest',  'middleware' => 'guest'], function(){
//         Route::post('/vouchers', 'Voucher\VoucherController@store')->name('storeVoucher');
//     });
// });




// Ying Ying 









// Alice








