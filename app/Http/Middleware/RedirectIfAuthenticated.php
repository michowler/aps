<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    // public function handle($request, Closure $next, $guard = null)
    // {
    //     if (Auth::guard($guard)->check()) {            
    //         return redirect('/');
    //     }

    //     return $next($request);
    // }

    public function handle($request, Closure $next, $guard = null)
   {
       if (Auth::guard($guard)->check()) {

           $auth = \Auth::user()->roles()->first();

           switch ($auth->title) {
               case 'admin':
                       return  redirect()->route('admin.dashboard');    
                   break;
               case 'respondent':
                       return  redirect()->route('res.dashboard');    
                   break;                   
               case 'merchant':
                       return  redirect()->route('myVouchers'); 
                   break;
               case 'owner':
                       return  redirect()->route('ownerDashboard');  
                   break;
               default:                   
                   return  redirect()->route('login');  
                   break;
           }   

        }

       return $next($request);
   }
}
