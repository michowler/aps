<?php

namespace App\Http\Controllers\plan;

use App\plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class planController extends Controller
{
    public function index(){
    	return view('owner.upgrade');
    }

    public function  checkout(){
    	return view ('payment.create');
    }

}
