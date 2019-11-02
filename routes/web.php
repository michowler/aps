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

// Route::group(['middleware' => 'web'], function () {
//     // Moving here will ensure that sessions, csrf, etc. is included in all these routes
//     Route::group(['prefix'=>'guest',  'middleware' => 'guest'], function(){
//         Route::post('/vouchers', 'Voucher\VoucherController@store')->name('storeVoucher');
//     });
// });



// Michelle , Alice
Auth::routes();
Auth::routes(['verify' => false]);
Auth::routes(['reset' => false]);
// Auth::routes(['register' => false]);

// Michelle 

//Vouchers
Route::get('/vouchers', 'Voucher\VoucherController@index')->name('myVouchers');
Route::get('/voucher/create', 'Voucher\VoucherController@create')->name('generate');
Route::post('/voucher/store', 'Voucher\VoucherController@store')->name('storeVoucher');
Route::post('/voucher/show/{vouchers_id}', 'Voucher\VoucherController@destroy')->name('deleteVoucher');
Route::get('/voucher/show/{vouchers_id}', 'Voucher\VoucherController@show')->name('showVoucher');
Route::get('/voucher/demo', 'Voucher\VoucherController@demo')->name('demo');
Route::get('/voucher/redeem/{vouchers_id}', 'Voucher\VoucherController@redeem')->name('redeemVoucher');
Route::get('/voucher/redeem/{vouchers_id}/qr-code', 'Voucher\VoucherController@redeem_qr')->name('redeemQR');
Route::get('/voucher/redeem', 'Voucher\VoucherController@redeem_index')->name('redeem');
Route::get('/voucher/edit/{vouchers_id}', 'Voucher\VoucherController@edit')->name('editVoucher');
Route::post('/voucher/edit/{vouchers_id}/update', 'Voucher\VoucherController@update')->name('updateVoucher');

//Respondents
Route::get('/{name}/profile', 'Respondent\RespondentController@edit')->name('editUser');
// Route::post('/{name}/profile', 'Respondent\RespondentController@destroy')->name('deleteUser');
// Route::post('/{name}/vouchers/{vouchers_id}/redeem/success', 'User\UserController@redeem_success')->name('redeemSuccess');

//Auth
Route::get('/', function () {
	if(Auth::check()) {
		return redirect()->route('myVouchers');
	}
	return view('auth.login');
})->name('home');



// Ying Ying 
Route::get('/upgrade', 'plan\planController@index');
Route::get('/create','plan\planController@checkout');
// Route::get('/','Survey\SurveyController@surveyList');
Route::get('/chart','Survey\SurveyController@showChart');
Route::post('store','plan\planController@store');









// Alice

Route::resource('surveys', 'OwnerController');

Route::post('/storeSurvey', 'OwnerController@store')->name('storeSurvey');

Route::get('/mySurvey','OwnerController@mySurvey');

Route::get('/createSurvey', 'OwnerController@createSurvey');

Route::post('/insert','OwnerController@insert');

Route::get('/createSurvey/editSurvey', 'OwnerController@createSurvey');

Route::get('/dashboard', 'OwnerController@dashboard');

Route::get('/userProfile', 'OwnerController@userProfile');

Route::get('/userProfile/editUserProfile', 'OwnerController@userProfile');

Route::get('/userProfile/saveUserProfile', 'OwnerController@userProfile');

Route::get('/login','FrontController@login')->name('login');

Route::get('/registerAs','FrontController@registerAs');

Route::get('/resRegister','FrontController@resRegister');

Route::get('/ownerRegister','FrontController@ownerRegister');

Route::get('/merchantRegister','FrontController@merchantRegister');

Route::get('/verify','FrontController@verify');

Route::get('/forgetPassword','FrontController@forgetPassword');

Route::get('/passwordNotification', 'FrontController@passwordNotification');

Route::get('/subPlan','FrontController@subPlan');

Route::get('/createQuestion', 'OwnerController@createQuestion');

Route::get('/createQuestion/editQuestion', 'OwnerController@createQuestion');

Route::get('/adminProfile','AdminController@adminProfile');

Route::get('/adminProfile/editAdminProfile','AdminController@adminProfile');

Route::get('/dashboardAdmin','AdminController@dashboardAdmin');

Route::get('/merchantTable','AdminController@merchantTable');

Route::get('/merchantTable/editMerchant','AdminController@merchantTable');

Route::get('/respondentTable','AdminController@respondentTable');

Route::get('/respondentTable/editRespondent','AdminController@respondentTable');

Route::get('/ownerTable','AdminController@ownerTable');

Route::get('/ownerTable/editOwner','AdminController@ownerTable');














