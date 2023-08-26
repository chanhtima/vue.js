<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\User\Http\Controllers\RoleController ;

class SetAdminAccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(config('app.admin_access_control')){

            $role = new RoleController();
            if($role->allow()){
                return $next($request);
            }else{ 
                redirect()->route('admin.not.permitted')->send();
            }
        }else{
            return $next($request);
        }
    }
}
