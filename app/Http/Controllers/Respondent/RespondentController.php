<?php

namespace App\Http\Controllers\Respondent;

use App\Voucher;
use App\User;
use App\VouchersType;
use App\surveys;
use Illuminate\Support\Facades\Crypt;
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

	public function res_voucher_show()
	{
		$voucher = Voucher::find(request('vouchers_id'))->firstOrFail();		
		$vouchers = Voucher::with('stores')->get();	
		$vcode1 = request('vouchers_id');
		$encrypted = Crypt::encryptString($vcode1);			
		$vType = VouchersType::where('vouchers_types_id', '=', $voucher->vouchers_types_id)->first();	
		return view('respondent.showVoucher', ['voucher' => $voucher, 'encrypted' => $encrypted , 'vType' => $vType]);
	}

	public function res_voucher_index()
	{
		$res = User::find(Auth::user()->users_id)->firstOrFail();		
		$vouchers = User::join('tag_respondents_surveys', 'users.users_id', '=', 'tag_respondents_surveys.users_id')
		    ->join('surveys', 'surveys.surveys_id', '=', 'tag_respondents_surveys.surveys_id')
		    ->where('tag_respondents_surveys.users_id', $res->users_id) 
		    ->join('vouchers', 'vouchers.vouchers_id', '=', 'surveys.vouchers_id')   
		    ->paginate(10);	
		$res_sur = $res->surveys()->get();		
		$vouchers->withPath('/resVoucher');       
		return view('respondent.resVoucher', ['res_sur' => $res_sur, 'vouchers' => $vouchers]);
	}

	public function redeem_success($vouchers_id)
	{
		$res = User::find(Auth::user()->users_id)->firstOrFail();				
		$res->surveys()->attach($vouchers_id,['voucher_redeemption_status' => 1 ]);
		$voucher = Voucher::find($vouchers_id);		
		if ($voucher->save()){    
		    return view('respondent.redeem_success');  
		}else{
		    return redirect()->route('res.dashboard')->with('error','Voucher redeem unsuccessful.');
		} 
	}


}
