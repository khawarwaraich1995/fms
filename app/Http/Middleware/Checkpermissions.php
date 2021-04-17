<?php

namespace App\Http\Middleware;

use Closure;
use App\Roles;
use App\User;
use App\Permissions;
use Auth;


class Checkpermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        
        if(Auth::guard('web')->check() && !empty(Auth::guard('web')->user()->role_id))
        {
            $admin = Auth::guard('web')->user()->role;
            $permissions = json_decode($admin->permissions, true);
            if(!in_array($permission, $permissions))
            {
                return redirect('403_page');
            }else
            {
                return $next($request);
            }
        }
    }
}
