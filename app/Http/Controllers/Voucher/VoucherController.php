<?php

namespace App\Http\Controllers\Voucher;

use App\Voucher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoucherController extends Controller
{
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

        //end of comment
        $voucher = new Voucher;
        
        $voucher->title = request('title');
        $voucher->publisher = request('terms');
        $voucher->outlet = request('outlet');
        $voucher->valid_date = request('valid_date');
        $voucher->expiry_date = request('expiry_date');
        $voucher->image = request()->file('image')->store('public/images');
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
