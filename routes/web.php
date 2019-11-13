<?php

use App\User;

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
Route::get('/voucher/redeem/{vcode1}', 'Voucher\VoucherController@redeem')->name('redeemVoucher');
Route::post('/voucher/redeem/{vcode1}', 'Voucher\VoucherController@redeem')->name('redeemVoucher');
Route::get('/voucher/redeem/qr-code/{vcode2}', 'Voucher\VoucherController@redeem_qr')->name('redeemQR');
Route::get('/voucher/redeem', 'Voucher\VoucherController@redeem_index')->name('redeem');
Route::get('/voucher/edit/{vouchers_id}', 'Voucher\VoucherController@edit')->name('editVoucher');
Route::post('/voucher/edit/{vouchers_id}/update', 'Voucher\VoucherController@update')->name('updateVoucher');

//Edit Profiles (merchant, respondent, owner)
Route::get('/merchant-profile/{name}/edit', 'User\UserController@edit_merchant')->name('editMerchant');
Route::get('/owner-profile/{name}/edit', 'User\UserController@edit_owner')->name('editOwner');
Route::get('/user-profile/{name}/edit', 'Respondent\RespondentController@edit')->name('editUser');
//Respondents
Route::get('/showVoucher/{vouchers_id}', 'Respondent\RespondentController@res_voucher_show')->name('showResVoucher');
Route::post('/profile/{name}', 'User\UserController@destroy')->name('deleteUser');
Route::post('/user-profile/{name}', 'Respondent\RespondentController@destroy')->name('deleteRes');
// Route::post('/{name}/profile', 'Respondent\RespondentController@destroy')->name('deleteUser');
Route::get('/{name}/vouchers/{vouchers_id}/redeem/success', 'Respondent\RespondentController@redeem_success')->name('redeemSuccess');
Route::post('/{name}/vouchers/{vouchers_id}/redeem-success', 'Respondent\RespondentController@redeem_v_success')->name('redeemVSuccess');

//Auth
Route::get('/', ['middleware' =>'guest', function(){
  return view('auth.login');
}]);


// Ying Ying 
Route::get('/upgrade', 'plan\planController@index')->name('packageSubscription');
Route::get('/create','plan\planController@checkout')->name('checkout');
Route::get('/chart','Survey\SurveyController@showChart');
Route::post('storePayment','plan\planController@store');




// Alice
//owner
Route::get('/ownerRegister','Auth\RegisterController@ownerRegister')->name('owner.register');
Route::get('/ownerDashboard', 'Owner\OwnerController@index')->name('ownerDashboard');
Route::resource('surveys', 'Survey\SurveyController');
Route::post("store", 'Survey\SurveyController@store')->name('storeSurvey');
Route::get('/createSurvey','Survey\SurveyController@createSurvey')->name('createSurvey');
Route::resource('questions', 'Survey\SurveyController@storeQuestion');
Route::post("storeQuestion", 'Survey\SurveyController@storeQuestion')->name('storeQuestion');
Route::get('/createQuestion','Survey\SurveyController@createQuestion')->name('createQuestion');
Route::get('/userProfile','Owner\OwnerController@userProfile')->name('owner.profile');
Route::get('/mySurvey','Survey\SurveyController@mySurvey')->name('ownerSurvey');
Route::get('/mySurvey/delete/{id}','Survey\SurveyController@destroy')->name('survey.destroy');


//admin
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/adminProfile','AdminController@adminProfile')->name('admin.profile');
Route::get('/merchantTable','AdminController@merchantTable')->name('merchantTable');
Route::get('/ownerTable','AdminController@ownerTable')->name('ownerTable');
Route::get('/respondentTable','AdminController@respondentTable')->name('respondentTable');

//respondent
Route::get('/resRegister','Auth\RegisterController@resRegister')->name('res.register');
//Route::post('/resRegister','Auth\RegisterController@register')->name('register');
Route::get('/res','Respondent\RespondentController@index')->name('res.dashboard');
Route::get('/resVoucher','Respondent\RespondentController@res_voucher_index')->name('resVoucher');

//merchant
Route::get('/merchantRegister','Auth\RegisterController@merchantRegister')->name('res.register');
//Route::get('/merchant','Auth\LoginController@merchant')->name('merchant.dashboard');

//
// Route::get('/userProfile', 'Owner\OwnerController@userProfile');

// Route::get('/userProfile/editUserProfile', 'Owner\OwnerController@userProfile');

// Route::get('/userProfile/saveUserProfile', 'Owner\OwnerController@userProfile');

//survey

//Route::get('/mySurvey','Survey\SurveyController@mySurvey');	//display survey list

//Route::get('/chart','Survey\SurveyController@showChart');

// Route::get('/createSurvey', 'Survey\SurveyController@create');

// Route::post('/storeSurvey', 'Survey\SurveyController@store')->name('storeSurvey');

// Route::resource('surveys', 'Owner\OwnerController');

// Route::post('/insert','Owner\OwnerController@insert');

// Route::get('/createSurvey/editSurvey', 'Owner\OwnerController@createSurvey');






// Route::get('/registerAs','FrontController@registerAs');

// Route::get('/resRegister','Auth\RegisterController@resRegister')->name('res.register');
// Route::get('/ownerRegister','Auth\RegisterControllerr@ownerRegister')->name('owner.register');

// Route::get('/verify','FrontController@verify');
// Route::get('/forgetPassword','FrontController@forgetPassword');
// Route::get('/passwordNotification', 'FrontController@passwordNotification');
// Route::get('/subPlan','FrontController@subPlan');
// Route::get('/createQuestion', 'Owner\OwnerController@createQuestion');
// Route::get('/createQuestion/editQuestion', 'Owner\OwnerController@createQuestion');
// Route::get('/adminProfile','AdminController@adminProfile');
// Route::get('/adminProfile/editAdminProfile','AdminController@adminProfile');
// Route::get('/dashboardAdmin','AdminController@dashboardAdmin');
// Route::get('/merchantTable','AdminController@merchantTable');
// Route::get('/merchantTable/editMerchant','AdminController@merchantTable');
// Route::get('/respondentTable','AdminController@respondentTable');
// Route::get('/respondentTable/editRespondent','AdminController@respondentTable');
// Route::get('/ownerTable','AdminController@ownerTable');
// Route::get('/ownerTable/editOwner','AdminController@ownerTable');














