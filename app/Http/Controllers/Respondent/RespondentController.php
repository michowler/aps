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

	public function redeem_success(Request $request)
	{
		$dateNow =  date('Y-m-d H:i:s');
		$res = User::find(\Auth::user()->users_id)->firstOrFail();	
		$vouchers_id = $request->vouchers_id;
		$voucher = Voucher::find($vouchers_id);		
		//$voucher = Voucher::where('vouchers_id', '=', $request->vouchers_id)->get(); 					
		$store = Store::find($request->stores_id);
		$res->surveys()->sync($request->vouchers_id,['voucher_redeem_status' => 1, 'voucher_redemption_date' => $dateNow, 'stores_id' => $request->stores_id]);
		if ($voucher->save()){    			
		    return redirect()->route('resVoucher', ['vouchers_id'=> $request->vouchers_id, 'stores_id' => $request->stores_id])->with('success','Voucher redeem successful.');
		} else{
		    return redirect()->route('resVoucher')->with('error','Voucher redeem unsuccessful.');
		}	
		
	}

	public function redeem_v_success(Request $request)
	{
		$dateNow =  date('Y-m-d H:i:s');
		$res = User::find(\Auth::user()->users_id)->firstOrFail();	
		$vouchers_id = $request->vouchers_id;
		$voucher = Voucher::find($vouchers_id);		
		//$voucher = Voucher::where('vouchers_id', '=', $request->vouchers_id)->get(); 					
		$store = Store::find($request->stores_id);
		$r_s = $res->surveys()->attach($request->vouchers_id,['voucher_redeem_status' => 1, 'voucher_redemption_date' => $dateNow, 'stores_id' => $request->stores_id])->get();
		// $r_s->updateExistingPivot($roleId, $attributes)
		if ($voucher->save()){    			
		    return redirect()->route('redeemSuccess', ['vouchers_id'=> $request->vouchers_id, 'stores_id' => $request->stores_id])->with('success','Voucher redeem successful.');
		}else{
		    return redirect()->route('resVoucher')->with('error','Voucher redeem unsuccessful.');
		}			
		
	}

}