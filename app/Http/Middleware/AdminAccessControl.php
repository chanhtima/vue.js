<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\User\Http\Controllers\RoleController;

class AdminAccessControl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(config('app.admin_access_control')){
            $role = new RoleController();
            if($role->allow_route()){
                return $next($request);
            }else{ 
                redirect()->route('admin.not.permitted')->send();
            }
        }else{
            return $next($request);
        }
    }
}
