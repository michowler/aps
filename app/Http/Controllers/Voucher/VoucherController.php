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
use Illuminate\Support\Facades\Crypt;
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
		// $this->middleware('merchant');
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
		$merchant = Merchant::where('users_id', '=', \Auth::user()->users_id)->firstOrFail();
		$vList = Voucher::where('merchants_id', '=', $merchant->merchants_id)->get();
		$vCount = $vList->count();					
		$vouchers = Voucher::where('merchants_id', $merchant->merchants_id)->paginate(10);				
		$vouchers->withPath('/vouchers');		
		return view('voucher.index', ['vouchers' => $vouchers, 'vCount' => $vCount ]);  		
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
		return view('voucher.create', ['stores' => $stores, 'interests' => $interests]);
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
		$validatedData = $request->validate([
			'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'title' => 'required|max:255',						
			'terms' => 'required',
			'expiry_date' => 'required', 
			'interests' => 'required',
			'stores' => 'required',
			'vouchers_types_id' => 'required'
		]);
		$voucher->merchants_id = \Auth::user()->users_id;
		$voucher->logo = request()->file('logo')->store('images');	
		$voucher->title = request('title');
		$voucher->terms = request('terms');		
		$interests = $request->input('interests');				
		$stores = $request->input('stores');	
		$voucher->status = request('status');	
		$voucher->qr_code = QrCode::size(250)->generate(route('redeemVoucher',['vouchers_id' => $voucher->vouchers_id]));   	
		$voucher->expiry_date = request('expiry_date');		
		$voucher->vouchers_types_id = request('vouchers_types_id');		
		
		$voucher->save();
		$voucher::findOrFail($voucher->vouchers_id)->interests()->attach($interests);
		$voucher::findOrFail($voucher->vouchers_id)->stores()->attach($stores,['status' => 1 ]);				
		return redirect()->route('myVouchers')->with('success','Voucher created successfully.');
			
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
		$vcode1 = request('vouchers_id');
		$encrypted = Crypt::encryptString($vcode1);			
		$vType = VouchersType::where('vouchers_types_id', '=', $voucher->vouchers_types_id)->first();				
		return view('voucher.show', ['voucher' => $voucher , 'encrypted' => $encrypted , 'vType' => $vType]);        
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
		return view('voucher.edit', ['voucher' => $voucher, 'vType' => $vType]);        
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
		$merchant = Merchant::where('users_id', '=', \Auth::user()->users_id)->firstOrFail();
		$vouchers = Voucher::where('merchants_id', $merchant->merchants_id)->paginate(10);				
		$vouchers->withPath('/vouchers/redeem'); //get only vouchers that are valid
		return view('voucher.redeem_index', ['vouchers' => $vouchers]);  		
	}

	public function redeem_success(Voucher $voucher) //should be inside respondents, post method
	{		
		//update the redeem status to 1
		//get and then save stores id in tag_suv_resp
		//udpate the redeemed voucher date
		//if done then view success redeem page
		$voucher->voucher_redeem_status = request('voucher_redeem_status');
		$voucher->voucher_redemption_date = request('voucher_redemption_date');
		
		$voucher::findOrFail($voucher->vouchers_id)->stores()->attach($stores,['status' => 1 ]);	
		if ($voucher->save()){
			 Alert::success('Success Redeem', 'Voucher redeemed successfully!');
			return redirect()->route('redeemSuccess');	
		}else{
			return redirect()->route('myVouchers')->with('error','Voucher redeem unsuccessful.');
		}				
	}

	public function redeem(Voucher $voucher, $vcode1)
	{
		$decrypted = Crypt::decryptString($vcode1);
		$voucher = Voucher::find($decrypted);		
		$vouchers = Voucher::with('stores')->get();	
		$encrypted = Crypt::encryptString($decrypted, $voucher->created_at);
		return view('voucher.redeem', ['voucher' => $voucher, 'vouchers' => $vouchers, 'encrypted' => $encrypted]);     
	}

	public function redeem_qr(Voucher $voucher, $vcode2)
	{		
		$decrypted = Crypt::decryptString($vcode2, $voucher->created_at);
		$voucher = Voucher::find(rtrim($decrypted, $voucher->created_at));		
		$vouchers = Voucher::with('stores')->get();								
		return view('voucher.redeem_qr', ['voucher' => $voucher, 'vouchers' => $vouchers]);        
	}

	public function update_status(Request $request)
	{
		$voucher = Voucher::where('vouchers_id', '=', $request->vouchers_id)->firstOrFail();
		$voucher->status = request('status');
		$voucher->save();
		return redirect()->route('myVouchers')->with('success','Voucher updated successfully');
	}

	public function demo(Voucher $voucher)
	{
		//
		return view('voucher.demo');
	}
}
