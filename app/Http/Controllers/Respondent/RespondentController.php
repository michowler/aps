<?php

namespace App\Http\Controllers\Respondent;

use App\Voucher;
use App\User;
use App\surveys;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RespondentController extends Controller
{

      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('respondent.res');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        return view('respondent.edit', ['user' => $user]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
        $user = Auth::user();
        $user->name = request('name');
        return view('respondent.update', ['user' => $user]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function res_voucher_index()
    {
        //1.find the user 
        //2. find all completed surveys from the user
        //3. get the voucher from the completed surveys
        //4. list the vouchers 
        $res = User::where('users_id', '=', \Auth::user()->users_id)->firstOrFail();               
        $surveyswithvouchers = surveys::where('vouchers_id', $res->merchants_id)->paginate(10);              
        $vouchers->withPath('/my-vouchers');       
        return view('respondent.resVoucher', ['vouchers' => $vouchers]);
    }
}
