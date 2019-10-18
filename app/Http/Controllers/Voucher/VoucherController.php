<?php

namespace App\Http\Controllers\Voucher;

use App\Voucher;
use Validator; 
use Storage;
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
		return view('voucher.create');
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
		// die();

		// var_dump(\Auth::user()->users_id);

		// var_dump(request('terms'));
		// var_dump(request('expiry_date'));        
		// var_dump(request('vouchers_types_id')); 

		$voucher = new Voucher; 
		// $tag_interests_vouchers = new intVoucher;		

		$validator = Validator::make($request->all(), [ // <---
			'title' => 'required|max:255',
			'outlet' => 'required',
			'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			'terms' => 'required',
			'expiry_date' => 'required'
		]);

		$voucher->merchants_id = \Auth::user()->users_id;
		$voucher->logo = request()->file('logo')->store('images');	
		$voucher->title = request('title');
		$voucher->terms = request('terms');
		$voucher->outlet = request('outlet');
		$voucher->qr_code = QrCode::size(250)->generate( route('redeem',['vouchers_id' => $voucher->vouchers_id]) );   
		$voucher->expiry_date = request('expiry_date');		
		$voucher->vouchers_types_id = request('vouchers_types_id');		
		
		if ($validator->fails()) {
			return redirect('voucher.create')->withErrors($validator)->withInput();
		}
		$voucher->save();
		return redirect()->route('myVouchers')->with('success','Voucher created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function show(Voucher $voucher, $vouchers_id, Request $request)
	{		
		// $voucher = Voucher::orderBy('vouchers_id', 'desc')->first();
		//return DB::table('files')->latest('upload_time')->first()/take(5)->get();					

		$voucher = Voucher::where('vouchers_id', '=', $request->vouchers_id)->firstOrFail();
		$logoFile = Storage::disk('public')->get("{$voucher->logo}");
		return view('voucher.show', ['voucher' => $voucher], ['logoFile' => $logoFile]);        
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Voucher $voucher)
	{
		return view('voucher.edit',compact('voucher'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Voucher $voucher)
	{
		$request->validate([
			'title' => 'required',
			'terms' => 'required',
			'outlet' => 'required',
		]);

		$voucher->update($request->all());

		return redirect()->route('myVouchers')->with('success','Voucher updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Voucher $voucher, $vouchers_id)
	{
		$voucher = Voucher::find(request('vouchers_id'));
		$voucher->delete();		
		return redirect()->route('myVouchers')->with('success','Voucher deleted successfully');
		
	}

	public function redeem(Voucher $voucher)
	{
		$vouchers = Voucher::Paginate(10);
		$vouchers->withPath('/vouchers/redeem'); //get only vouchers that are valid
		return view('voucher.redeem', ['vouchers' => $vouchers]);  		

	}

	public function demo(Voucher $voucher)
	{
		//
		return view('voucher.demo');
	}
}
