<?php

namespace App\Http\Middleware;

use Illuminate\Middleware\Role as Middleware;

class Role extends Middleware
{
    public function handle($request, Closure $next,$role='')
    {
     
        $userRole = $request->user();
 
        if($userRole && $userRole->count() > 0)
        {
            $userRole = $userRole->role;
            $checkRole = 0;
            if($userRole == $role && $role =='respondent')
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role == 'owner')
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role == 'merchant')
            {
                $checkRole = 1;
            }
            elseif($userRole == $role && $role == 'admin')
            {
                $checkRole = 1;
            }
            
            if($checkRole == 1)
                return $next($request);
            else
               return abort(401);
        }
        else
        {
            return redirect('login');
        }
    }
}

