<?php

namespace App\Http\Controllers\Voucher;

use App\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
		//
		$vouchers = Voucher::all();
		return view('voucher.index', ['vouchers' => $vouchers]);        
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
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
		

		$voucher->merchants_id = \Auth::user()->users_id;
		$voucher->title = request('title');
		$voucher->terms = request('terms');
		$voucher->outlet = request('outlet');        
		$voucher->expiry_date = request('expiry_date');		
		$voucher->vouchers_types_id = request('vouchers_types_id');		
		// $voucher->image = request()->file('image')->store('public/images');
		$voucher->save();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function show(Voucher $voucher)
	{
		//
		die("Stop here by MM in show");
		return view('voucher.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Voucher $voucher)
	{
		//
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Voucher  $voucher
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Voucher $voucher)
	{
		//
	}

	public function redeem(Voucher $voucher)
	{
		//
		return view('voucher.redeem');

	}

	public function demo(Voucher $voucher)
	{
		//
		return view('voucher.demo');
	}
}
