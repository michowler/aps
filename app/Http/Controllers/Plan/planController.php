<?php

namespace App\Http\Controllers\plan;

use Auth;
use DB;
use App\plan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\payments;
use App\Package;
use Carbon\Carbon;


class planController extends Controller
{
    public function index(){
        return view('surveyOwner.upgrade');
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

            $payments -> amount = '100';
            $payments -> status = '1';
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


            DB::table('tag_owner_packages')->insert(
                ['packages_id' => 2, 'users_id' => Auth::user()->users_id, 'no_surveys' => -1, 'no_respondents' => -1, 'no_questions' => -1,'start_date' => Carbon::today()->format('Y-m-d')]
                );

            $latestOwnerPackageID = DB::table('tag_owner_packages')->where('users_id',Auth::user() -> users_id)->get()->last()->owner_packages_id;
            $payments -> owner_packages_id = $latestOwnerPackageID;

            $payments -> save();

            // return view('surveyOwner.owner_dashboard');

    }

    public function unSub(){

        DB::table('tag_owner_packages')->insert(
                ['packages_id' => 1, 'users_id' => Auth::user()->users_id, 'no_surveys' => 20, 'no_respondents' => 50, 'no_questions' => 10, 'end_date' =>  Carbon::today()->addMonth(1)->format('Y-m-d H:i:s')]
                );

        return view('surveyOwner.owner_dashboard');

    }

}
