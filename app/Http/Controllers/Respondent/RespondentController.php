<?php

namespace App\Http\Controllers\Respondent;

use App\Voucher;
use App\User;
use App\VouchersType;
use App\Store;
use App\surveys;
use DateTime;
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
		// $vouchers = surveys::join('tag_respondents_surveys', 'tag_respondents_surveys.surveys_id', '=', 'surveys.surveys_id')			
		//     ->join('vouchers', 'vouchers.vouchers_id', '=', 'surveys.vouchers_id')   
		//     ->where('tag_respondents_surveys.users_id', '=', $res->users_id) 	
		//     ->select('vouchers.vouchers_id', 'tag_respondents_surveys.voucher_redeem_status', 'vouchers.title', 'vouchers.status', 'vouchers.expiry_date' )
		//     ->paginate(10);
		// $res_sur = $res->surveys()->get();
	    $vouchers = \DB::table('tag_respondents_surveys')
        ->join('surveys', 'tag_respondents_surveys.surveys_id', '=', 'surveys.surveys_id')
        ->join('vouchers', 'vouchers.vouchers_id', '=', 'surveys.vouchers_id')
        ->select('vouchers.vouchers_id', 'tag_respondents_surveys.voucher_redeem_status', 'vouchers.title', 'vouchers.status', 'vouchers.expiry_date')
        ->where('tag_respondents_surveys.users_id', '=', \Auth::user()->users_id)             
        ->paginate(10);
           	
		$vouchers->withPath('/resVoucher');       
		return view('respondent.resVoucher', ['vouchers' => $vouchers]);
	}

	public function redeem_accept(Request $request)
	{
		$voucher = Voucher::find($request->vouchers_id)->firstOrFail();
		$store = Store::find($request->stores_id)->firstOrFail();
	
		return view('respondent.redeem_success', ['voucher'=> $voucher, 'store' => $store]);		
	}

	public function redeem_v_success(Request $request, $vouchers_id)
	{
		$dateNow =  date('Y-m-d H:i:s');
		$res = User::find(\Auth::user()->users_id)->firstOrFail();			
		$voucher = Voucher::find($vouchers_id)->firstOrFail();			
		$voucher->max_redeem = $voucher->max_redeem-1;	
		$survey = surveys::where('vouchers_id', '=', $voucher->vouchers_id )->firstOrFail();
		if ($res->surveys()->where('surveys_id', $survey->surveys_id)->first()->pivot->voucher_redeem_status == 1 ){
		    return redirect()->route('resVoucher')->with('error','Error. Voucher has been redeemed.');
		} else if ($voucher->save()){
			\DB::table('tag_respondents_surveys')			
			->where('tag_respondents_surveys.users_id', \Auth::user()->users_id)
			->where('tag_respondents_surveys.surveys_id', $survey->surveys_id)
			->update(array('voucher_redeem_status' => 1, 'voucher_redemption_date' => $dateNow, 'stores_id' => $request->stores_id));
		    return redirect()->route('resVoucher')->with('success','Voucher redeem successful!');
		} else {
			return redirect()->route('resVoucher')->with('error','Error. Voucher redeem unsuccessful.');
		}		
		
	}

}