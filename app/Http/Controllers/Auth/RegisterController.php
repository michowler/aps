<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\User;
use App\Package;
use App\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    // public function authenticated($request , $user){
    //     if($user->role=='super_admin'){
    //         return redirect()->route('admin.dashboard') ;
    //     }elseif($user->role=='brand_manager'){
    //         return redirect()->route('brands.dashboard') ;
    //     }
    // }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $startDate =  date('Y-m-d H:i:s');

        // var_dump($_REQUEST);                   
        // die();     

        $role = $data['roles_id']; 
        $user =  User::create([            
            'name' => $data['name'],            
            'email' => $data['email'],                                
            'password' => Hash::make($data['password'])            
        ]);       
                
        $packages = Package::where('packages_id', '=', 1)->get();        
        $roles = Role::where('roles_id', '=', $role)->get();  
        $user::findOrFail($user->users_id)->packages()->attach($packages, ['start_date' => $startDate]);
        $user::findOrFail($user->users_id)->roles()->attach($roles);

        // $user->notify(new UserRegisteredSuccessfully($user));
        return $user;    

        return redirect()->back()->with('message', 'Successfully created a new account!');            
        
    }




}
