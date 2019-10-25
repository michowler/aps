<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    

    public function login(){
    	return view('frontView.home.login');
    }

        

    public function registerAs(){
    	return view('frontView.home.registerAs');
    }

    public function resRegister(){
    	return view('frontView.home.resRegister');
    }

    public function ownerRegister(){
    	return view('frontView.home.ownerRegister');
    }

    public function merchantRegister(){
    	return view('frontView.home.merchantRegister');
    }

    public function forgetPassword(){
    	return view('frontView.home.forgetPassword');
    }

    public function passwordNotification(){
    	return view ('frontView.home.passwordNotification');
    }

    public function subPlan(){
    	return view ('frontView.home.subPlan');
    }
}
