<?php

namespace App\Http\Controllers\plan;

use Auth;
use DB;
use App\plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\payments;


class planController extends Controller
{
    public function index(){
    	return view('owner.upgrade');
    }

    public function  checkout(){
    	return view ('payment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payments = new Payments;


            
            // $payments -> users_id = 1;
            $payments -> amount = '100';
            $payments -> first_name =   $request ->first_name;
            $payments -> last_name  =   $request ->last_name;
            $payments -> billing_address    =   $request ->billing_address;
            $payments -> city   = $request ->city;
            $payments -> country    = $request ->country;
            $payments -> postal_code    = $request ->postal_code;
            $payments -> name_on_card   = $request ->name_on_card;
            $payments -> card_num   = $request ->card_num;
            $payments -> card_expiry    = $request ->card_expiry;
            $payments -> sec_code   = $request ->sec_code;
            $payments -> users_id = Auth::user() -> users_id;

            $payments -> save();

        	// $first_name	=	$request ->input('first_name');
        	// $last_name	=	$request ->input('last_name');
        	// $billing_address	=	$request ->input('billing_address');
        	// $city	= $request ->input('city');
        	// $country	= $request ->input('country');
        	// $postal_code	= $request ->input('postal_code');
        	// $name_on_card	= $request ->input('name_on_card');
        	// $card_num	= $request ->input('card_num');
        	// $card_expiry	= $request ->input('card_expiry');
        	// $sec_code	= $request ->input('sec_code');

         //    $data = array("first_name" => $first_name, "last_name" => $last_name, "billing_address" => $billing_address, "city" => $city, "country" => $country, "postal_code" => $postal_code, 
         //        "name_on_card" => $name_on_card, "card_num"    => $card_num, "card_expiry" => $card_expiry, 
         //        "sec_code" => $sec_code);

         //    DB::table('payments') -> insert($data);
         //    echo"Success.<br/>";


        // $payments ->save();
        // return redirect() -> route('payment.create') ;
    }

}
