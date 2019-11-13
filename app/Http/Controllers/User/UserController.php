<?php

namespace App\Http\Controllers\User;

use App\Voucher;
use App\User;
use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit_merchant()
    {        
        return view('merchant.edit');
    }

    public function edit_owner()
    {
        return view('owner.edit');
    }

    public function redeem_v_success(Voucher $voucher) //should be inside respondents, post method
    {       
        //update the redeem status to 1
        //get and then save stores id in tag_suv_resp
        //udpate the redeemed voucher date
        //if done then view success redeem page
        $voucher->status = 'Invalid';
        // $voucher->voucher_redeem_status = request('voucher_redeem_status');
        // $voucher->voucher_redemption_date = request('voucher_redemption_date');        
        // $voucher::findOrFail($voucher->vouchers_id)->stores()->attach($stores,['status' => 1 ]);    
        if ($voucher->save()){
             
            return redirect()->route('redeemSuccess', ['vouchers_id'=> $voucher->vouchers_id, 'name' => \Auth::user()->name]);  
        }else{
            return redirect()->route('res.dashboard')->with('error','Voucher redeem unsuccessful.');
        }               
    }

    public function redeem_success(Voucher $voucher) //should be inside respondents, post method
    {               
        $voucher->status = 'Invalid';
        if ($voucher->save()){    

            return view('respondent.redeem_success');  
        }else{
            return redirect()->route('res.dashboard')->with('error','Voucher redeem unsuccessful.');
        } 
    }

    public function destroy(User $user)
    {
    	$user = User::find(request('users_id'));
    	$user->delete();		
    	return redirect()->route('login')->with('success','User deleted successfully');
    }
}
