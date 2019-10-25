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
Route::post('/vouchers/show/{vouchers_id}', 'Voucher\VoucherController@destroy')->name('deleteVoucher');
Route::get('/vouchers/show/{vouchers_id}', 'Voucher\VoucherController@show')->name('showVoucher');
Route::get('/vouchers/demo', 'Voucher\VoucherController@demo')->name('demo');
Route::get('/vouchers/redeem', 'Voucher\VoucherController@redeem')->name('redeem');
Route::post('/vouchers/redeem/{vouchers_id}', 'Voucher\VoucherController@redeem')->name('redeemVoucher');

Route::get('/users/edit/{users_id}', 'Respondent\RespondentController@edit')->name('editUser');

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
Route::get('/upgrade', 'plan\planController@index');
Route::get('/create','plan\planController@checkout');
// Route::get('/','Survey\SurveyController@surveyList');
Route::get('/chart','Survey\SurveyController@showChart');
Route::post('store','plan\planController@store');









// Alice
Route::get('index','OwnerController@index');
Route::post('store','OwnerController@store');







