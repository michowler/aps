<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Admin.admin');
    }

    public function adminProfile()
    {
        return view('Admin.adminProfile');
    }

    public function merchantTable()
    {
        $merchants = DB::select('select * from merchants');
        return view('Admin.merchantTable',['merchants'=>$merchants]);
    
    }
    public function ownerTable()
      {
        
        $usersID = DB::table('tag_users_roles')->where('roles_id',2)->pluck('users_id')->toArray();
        $users = User::find($usersID);
        return view('Admin.ownerTable',['users'=>$users]);
     }
    public function respondentTable(){
         $usersID = DB::table('tag_users_roles')->where('roles_id',1)->pluck('users_id')->toArray();
        $users = User::find($usersID);
        return view('Admin.respondentTable',['users'=>$users]);
    }
    public function destroy($id)
        { 
            \App\Merchant::destroy($id);
            \App\User::destroy($id);
            return redirect()->route('merchantTable')->with('success','Merchant deleted successfully');
            return redirect()->route('ownerTable')->with('success','Owner deleted successfully');
            return redirect()->route('respondentTable')->with('success','Respondent deleted successfully');
            
        }
}
