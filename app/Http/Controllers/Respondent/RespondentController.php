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

		$res = User::where('users_id', '=', \Auth::user()->users_id)->firstOrFail();		
		$surveys = $res->surveys()->get()->vouchers()->get();
		// $vouchers = $surveys->vouchers()->get();
		
		// $surveys->withPath('/my-vouchers');       
		return view('respondent.resVoucher', ['surveys' => $surveys]);
	}


}
