<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\User\Entities\Roles;
use Modules\User\Entities\Users;

class RoleController extends Controller
{
    public $exclude_route = ['admin.login', 'admin.logout', 'admin.forget_password', 'admin.reset_password', 'admin.set_reset_password', 'admin.notify', 'admin.default', 'admin.role.failback','admin.user.permission.generate_permission'];
    public $exclude_user_group = [];

    const EXCLUDE_ROUTE = ['admin.login', 'admin.logout', 'admin.forget_password', 'admin.reset_password', 'admin.set_reset_password', 'admin.notify', 'admin.default', 'admin.role.failback','admin.user.permission.generate_permission'];
    public static function roles_route(){
        return Roles::with('permissions_route_name')->where('id',Auth::guard('admin')->user()->role_id)->first(['id','name']) ;
    }

    public static function roles_group(){
        return Roles::with('permissions_group')->where('id',Auth::guard('admin')->user()->role_id)->first(['id','name']) ;
    }

    public static function allow_route($route='')
    {
        if(empty($route)){ $route = Route::currentRouteName();} 
        if (Auth::guard('admin')->user()->id==1) {
            return true;
        } else {
            if(in_array($route,RoleController::EXCLUDE_ROUTE)){
                return true ;
            }else{
                $roles = RoleController::roles_route() ;
                if(!empty($roles)){
                        foreach($roles->permissions_route_name as $permission){
                            if($permission->route_name == $route){
                                return true ;
                                break;
                            }   
                        }
                }
            }
        }
        return false ; 
    }

    public static function allow($module='',$group='view')
    {
        if (Auth::guard('admin')->user()->id==1) {
            return true;
        } else {
           
            $roles = RoleController::roles_route() ;
            if(!empty($roles)){
                    foreach($roles->permissions_group as $permission){
                        if($permission->module==$module&&$permission->group==$group){
                            return true ;
                            break;
                        }   
                    }
            }
            
        }
        return false ; 
    }

    public function checkAccessControl($route, $id = 0)
    {
        if (!empty($id)) {
            $user = Users::find($id);
        } else {
            $user = Auth::guard('admin')->user();
        }

        if ($user->id == 1) {
            return true;
        }
        // bypass user group 
        if (in_array($user->group_id, $this->exclude_user_group)) {
            return true;
        }
        // bypass exclude route 
        if (in_array($route, $this->exclude_route)) {
            return true;
        }

        // if (!is_array($user->role)) {
        //     $user->role = json_decode($user->role, 1);
        // }
        // $roles = $this->roles();

        list($profix, $module, $page, $action) = explode('.', $route);
        if ($profix == 'admin') {
            if ($module == 'user' && $user->id == $id) {
                return true;
            }
            if (isset($roles[$module][$page])) {
                $allow_action = '';

                foreach ($roles[$module][$page] as $action => $method) {

                    if (in_array($route, $method)) {
                        $allow_action = $action;
                        break;
                    }
                }

                // dd($user->role);
                if (!empty($allow_action) && isset($user->role[$module][$page][$allow_action])) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
   
}
