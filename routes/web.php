<?php


use App\User;
use App\Voucher;
use Request;



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
Auth::routes(['verify' => true]);
Auth::routes(['reset' => true]);
// Auth::routes(['register' => false]);

// Michelle 

//Vouchers
Route::any( '/vouchers', function () {
	$q = Request::input( 'q' );
	if($q != ""){
		$vouchers = Voucher::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'status', 'LIKE', $q  )->paginate (5)->setPath ( '/vouchers' );
		$vCount = Voucher::where ( 'title', 'LIKE', '%' . $q . '%' )->orWhere ( 'status', 'LIKE', $q )->get()->count();
		$pagination = $vouchers->appends ( array (
		'q' => Request::input( 'q' ) 
		) 
	);
	if (count ( $vouchers ) > 0 || $vCount > 0)
		return view ( 'voucher.index' , ['vouchers'=> $vouchers, 'vCount'=>$vCount])->withQuery ( $q );
	}else{
		return redirect()->route('myVouchers')->with('error','Sorry! No record found. Search again.');	
	}
} );
Route::get('/vouchers', 'Voucher\VoucherController@index')->name('myVouchers');
Route::get('/voucher/create', 'Voucher\VoucherController@create')->name('generate');
Route::post('/voucher/store', 'Voucher\VoucherController@store')->name('storeVoucher');
Route::post('/voucher/show/{vouchers_id}', 'Voucher\VoucherController@destroy')->name('deleteVoucher');
Route::get('/voucher/show/{vouchers_id}', 'Voucher\VoucherController@show')->name('showVoucher');
Route::get('/voucher/demo', 'Voucher\VoucherController@demo')->name('demo');
Route::get('/voucher/redeem/{vcode1}/{surveys_id}', 'Voucher\VoucherController@redeem')->name('redeemVoucher');
Route::get('/voucher/redeem/qr-code/{vcode2}/{surveys_id}', 'Voucher\VoucherController@redeem_qr')->name('redeemQR');
// Route::post('/voucher/redeem/qr-code/{vcode2}/{surveys_id}/success', 'Voucher\VoucherController@redeem_qr_s')->name('redeemQRS');
Route::get('/voucher/redeem', 'Voucher\VoucherController@redeem_index')->name('redeem');
Route::get('/voucher/edit/{vouchers_id}', 'Voucher\VoucherController@edit')->name('editVoucher');
Route::post('/voucher/edit/{vouchers_id}/update', 'Voucher\VoucherController@update')->name('updateVoucher');

//Edit Profiles (merchant, respondent, owner)
Route::get('/merchant-profile/{name}/edit', 'Merchant\MerchantController@edit')->name('editMerchant');
Route::post('/merchant-profile/{name}/edit', 'Merchant\MerchantController@update')->name('updateMerchant');
Route::get('/owner-profile/{name}/edit', 'Owner\OwnerController@edit')->name('editOwner');
Route::post('/owner-profile/{name}/edit', 'Owner\OwnerController@update')->name('updateOwner');
Route::get('/user-profile/{name}/edit', 'Respondent\RespondentController@edit')->name('editUser');
Route::post('/user-profile/{name}/edit', 'Respondent\RespondentController@update')->name('updateUser');
//Delete account
Route::post('/owner-profile/{name}/delete', 'Owner\OwnerController@destroy')->name('deleteOwner');
Route::post('/merchant-profile/{name}/delete', 'Merchant\MerchantController@destroy')->name('deleteMerchant');
Route::post('/user-profile/{name}/delete', 'Respondent\RespondentController@destroy')->name('deleteUser');

//Respondents
Route::get('/showVoucher/{surveys_id}/{vouchers_id}', 'Respondent\RespondentController@res_voucher_show')->name('showResVoucher');
Route::get('resVoucher/redeem-accept/{vouchers_id}/{stores_id}/{surveys_id}', 'Respondent\RespondentController@redeem_accept')->name('redeemAccept');
Route::post('resVoucher/redeem-accept/{vouchers_id}/{stores_id}/{surveys_id}', 'Respondent\RespondentController@redeem_v_success')->name('redeemVSuccess');

//Auth
Route::get('/', ['middleware' =>'guest', function(){
  return view('auth.login');
}]);
// Route::get('/', function () {
    
// })->middleware('verified');


// Ying Ying 
Route::get('/upgrade', 'plan\planController@index')->name('packageSubscription');
Route::get('/create','plan\planController@checkout')->name('checkout');
Route::get('/chart','Survey\SurveyController@showChart');
Route::post('storePayment','plan\planController@store');




// Alice
//owner
Route::get('/ownerRegister','Auth\RegisterController@ownerRegister')->name('owner.register');
Route::get('/ownerDashboard', 'Owner\OwnerController@index')->name('ownerDashboard');
//survey
Route::resource('surveys', 'Survey\SurveyController');
Route::post('/store', 'Survey\SurveyController@store')->name('storeSurvey');
Route::get('/createSurvey','Survey\SurveyController@createSurvey')->name('createSurvey');
//question
Route::resource('questions', 'Survey\SurveyController@storeQuestion');
Route::post("storeQuestion", 'Survey\SurveyController@storeQuestion')->name('storeQuestion');
Route::get('/createQuestion','Survey\SurveyController@createQuestion')->name('createQuestion');
Route::get('/userProfile','Owner\OwnerController@userProfile')->name('owner.profile');
Route::get('/mySurvey','Survey\SurveyController@mySurvey')->name('ownerSurvey');
Route::get('/mySurvey/delete/{id}','Survey\SurveyController@destroy')->name('survey.destroy');
//option
Route::resource('options', 'Survey\SurveyController@storeOption');
Route::post("storeOption", 'Survey\SurveyController@storeOption')->name('storeOption');
Route::get('/createOption/{id}','Survey\SurveyController@createOption')->name('createOption');
Route::get('/ownerViewSurvey','Owner\OwnerController@ownerViewSurvey')->name('ownerViewSurvey');

//admin
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
Route::get('/adminProfile','AdminController@adminProfile')->name('admin.profile');
Route::get('/merchantTable','AdminController@merchantTable')->name('merchantTable');
Route::get('/ownerTable','AdminController@ownerTable')->name('ownerTable');
Route::get('/respondentTable','AdminController@respondentTable')->name('respondentTable');
Route::get('/merchantTable/delete/{id}','AdminController@destroy')->name('merchant.destroy');
Route::get('/ownerTable/delete/{id}','AdminController@destroy')->name('owner.destroy');
Route::get('/respondentTable/delete/{id}','AdminController@destroy')->name('respondent.destroy');

//respondent
Route::get('/resRegister','Auth\RegisterController@resRegister')->name('res.register');
Route::get('/res','Respondent\RespondentController@surveyList')->name('res.dashboard');
Route::get('/resFilter','Respondent\RespondentController@filterSurvey');
Route::get('/resProfile','Respondent\RespondentController@resProfile')->name('res.profile');
Route::get('/resVoucher','Respondent\RespondentController@resVoucher')->name('resVoucher');
Route::resource('choices', 'Survey\SurveyController@storeChoice');
Route::post("storeChoice", 'Survey\SurveyController@storeChoice')->name('storeChoice');
Route::get('/viewSurvey','Respondent\RespondentController@viewSurvey')->name('viewSurvey');
Route::get("saveAnswer", 'Respondent\RespondentController@saveAnswer')->name('saveAnswer');
// Route::get('/answer','Respondent\RespondentController@saveAnswer')->name('saveAnswer');

//merchant
Route::get('/merchantRegister','Auth\RegisterController@merchantRegister')->name('res.register');
Route::get('/merchantRegister','Auth\RegisterController@merchantRegister')->name('merchant.register');









