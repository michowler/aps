<?php

namespace App\Http\Controllers\Merchant;

use App\Merchant;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function edit()
    {        
    	$merchant = Merchant::find(\Auth::user()->users_id);
        return view('merchant.edit', ['merchant' => $merchant]);
    }

    public function update()
    {        
        $merchant = Merchant::find(\Auth::user()->users_id);
        $merchant->merchants_name = request('merchants_name');
        $merchant->merchants_address = request('merchants_address');
        $merchant->merchants_phone = request('merchants_phone');
        $merchant->merchants_email = request('merchants_email');
        if ($merchant->save()){ 
            alert()->success('Profile updated!');            
            return redirect()->route('editMerchant', ['name' => \Auth::user()->name]); 
        }else{            
        	alert()->error('Profile update unsuccessful!'); 
            return redirect()->route('editMerchant', ['name' => \Auth::user()->name]); 
        }  
    }
}
