<?php

namespace App\Http\Controllers\Voucher;

use App\Voucher;
use App\Merchant;
use App\Store;
use App\Interest;
use App\VouchersType;
use QrCode;
use Validator; 
use Storage;
use Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;


class VoucherController extends Controller
{

	protected $user;

   /**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware(function ($request, $next) {
			$this->user = Auth::user();
			return $next($request);
		});
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		// $vouchers = DB::table('vouchers')->paginate(15);
		$vouchers = Voucher::Paginate(10);
		$vouchers->withPath('/vouchers');
		return view('voucher.index', ['vouchers' => $vouchers]);  

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{		
		//show stores available from database		
		$stores = Store::where('merchants_id', \Auth::user()->users_id)->get();
		$interests = Interest::all();		
		return view('voucher.create', ['stores' => $stores], ['interests' => $interests]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//this part is just for testing. after test, this part must e commented
		// echo "<pre>";
		// var_dump($_REQUEST);

		// var_dump(\Auth::user()->users_id);		
		// var_dump( $request->input('interests'));  		
		// die();

		$voucher = new Voucher; 		

		$validator = Validator::make($request->all(), [ // <---
			'title' => 'required|max:255',			
			'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'terms' => 'required',
			'expiry_date' => 'required', 
			'vouchers_types_id' => 'required'
		]);

		$voucher->merchants_id = \Auth::user()->users_id;
		$voucher->logo = request()->file('logo')->store('images');	
		$voucher->title = request('title');
		$voucher->terms = request('terms');		
		$interests = $request->input('interests');				
		$stores = $request->input('stores');		
		$voucher->qr_code = QrCode::size(250)->generate(route('redeemVoucher',['vouchers_id' => $voucher->vouchers_id]));   	
		$voucher->expiry_date = request('expiry_date');		
		$voucher->vouchers_types_id = request('vouchers_types_id');		
		
		if ($validator->fails()) {
			return redirect('voucher.create')->withErrors($validator)->withInput();
		} else{
			$voucher->save();
			$voucher::findOrFail($voucher->vouchers_id)->interests()->attach($interests);
			$voucher::findOrFail($voucher->vouchers_id)->stores()->attach($stores,['status' => 1 ]);				
			return redirect()->route('myVouchers')->with('success','Voucher created successfully.');
		}		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function show(Voucher $voucher, Request $request)
	{		
		// $voucher = Voucher::orderBy('vouchers_id', 'desc')->first();
		//return DB::table('files')->latest('upload_time')->first()/take(5)->get();					
		// $store = Store::where('stores_id', '=', request('stores_id'))->with('vouchers');
		$voucher = Voucher::where('vouchers_id', '=', $request->vouchers_id)->firstOrFail();		
		$vouchers = Voucher::with('stores')->get();		
		$vType = VouchersType::where('vouchers_types_id', '=', $voucher->vouchers_types_id)->first();		
		return view('voucher.show', ['voucher' => $voucher], ['vType' => $vType]);        
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request)
	{
		$voucher = Voucher::where('vouchers_id', '=', $request->vouchers_id)->firstOrFail();		
		// $interests = $voucher->interests()->wherePivot('vouchers_id', '=', $voucher->vouchers_id)->get();
		// $stores = Store::where('merchants_id', \Auth::user()->users_id)->get();		
		$vType = VouchersType::where('vouchers_types_id', $voucher->vouchers_types_id)->pluck('vouchers_type');		
		return view('voucher.edit', ['voucher' => $voucher], ['vType' => $vType]);        
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$voucher = Voucher::where('vouchers_id', '=', $request->vouchers_id)->firstOrFail();
		$request->validate([
			'title' => 'required',
			'terms' => 'required',
			'expiry_date' => 'required',	
				
		]);

		// $voucher = Voucher::where('vouchers_id', '=', $request->vouchers_id)->firstOrFail();		
        $voucher->title = request('title');
        $voucher->terms = request('terms');
		$voucher->qr_code = QrCode::size(250)->generate(route('redeemVoucher',['vouchers_id' => $voucher->vouchers_id]));   
        $voucher->expiry_date = request('expiry_date');
        $voucher->vouchers_types_id = request('vouchers_types_id');		
		$voucher->save();

		return redirect()->route('myVouchers')->with('success','Voucher updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Voucher $voucher)
	{
		$voucher = Voucher::find(request('vouchers_id'));
		// $voucher->stores()->detach($stores_id);
		// $voucher->interests()->detach($interests_id);
		$voucher->delete();		
		return redirect()->route('myVouchers')->with('success','Voucher deleted successfully');
		
	}

	public function redeem_index(Voucher $voucher)
	{
		$vouchers = Voucher::Paginate(10);
		$vouchers->withPath('/vouchers/redeem'); //get only vouchers that are valid
		return view('voucher.redeem_index', ['vouchers' => $vouchers]);  		
	}

	public function redeem_success(Voucher $voucher)
	{		
		return view('voucher.redeem_success');  		
	}

	public function redeem(Voucher $voucher)
	{
		$voucher = Voucher::find(request('vouchers_id'));
		$vouchers = Voucher::with('stores')->get();
		return view('voucher.redeem', ['voucher' => $voucher], ['vouchers' => $vouchers]);        
	}

	public function demo(Voucher $voucher)
	{
		//
		return view('voucher.demo');
	}
}
