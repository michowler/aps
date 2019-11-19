<?php

namespace App\Http\Controllers\Merchant;

use App\Merchant;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function edit()
    {        
    	$merchant = Merchant::where('users_id', '=', \Auth::user()->users_id)->first();
        return view('merchant.edit', ['merchant' => $merchant]);
    }

    public function update()
    {        
        $merchant = Merchant::where('users_id', '=', \Auth::user()->users_id)->first();
        $merchant->merchants_name = request('merchants_name');
        $merchant->merchants_address = request('merchants_address');
        $merchant->merchants_phone = request('merchants_phone');
        $merchant->merchants_email = request('merchants_email');
        if ($merchant->save()){ 
            alert()->success('Profile updated!');            
            return redirect()->route('editMerchant', ['name' => \Auth::user()->name]); 
        }else{            
        	alert()->error('Profile update unsuccessful!'); 
            return redirect()->back();
        }  
    }

    public function destroy()
    {       
        $curUser = Merchant::find(\Auth::user()->users_id);                             
        
        if ($curUser->delete()){            
            Alert::message('Your account has been deleted. You have been logged out.')->persistent('Close');
           return Auth::logout();
        }       
    }
}
