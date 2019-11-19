<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Admin;

class AdminLoginController extends Controller
{

	public function __construct (){
		$this -> middleware('guest:admin');
	}
    public function showLoginForm(){
    	return view('auth.admin-login'); //admin-login is a view
    }

    public function login(Request $request){
    	//validate the form data
    	$this->validate($request, [
    		'email'=>'required|email',
    		'password' =>'required|min:6'
    	]);


    	// //attempt to log the user in
    	// if(Auth::guard('admin')->attempt(['email' => $request->email, 'password'=>  $request->password],$request->remember)){
    		//if succssful then redirect to their intended location
    		return redirect()->route('admin.dashboard');
    	

    	//if unsuccessful then refirect back to the login with the form data
    	//return redirect()->back()->withInput($request->only('email','remember')); //only pass back emil and remember if unsuccesfull login
    }
    public function admin(){
        return view('Admin.admin');
    }
}
 