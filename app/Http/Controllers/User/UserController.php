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

    public function destroy(User $user)
    {
    	$user = User::find(request('users_id'));
    	$user->delete();		
    	return redirect()->route('login')->with('success','User deleted successfully');
    }
}
