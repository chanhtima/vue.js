<?php
// use Modules\User\Http\Controllers\PassportAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// echo 'route module user';

Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
});


Route::prefix('api')->group(function() {
    Route::post('/register', 'PassportAuthController@register')->name('api.register');
    Route::post('/login', 'PassportAuthController@login')->name('api.login');   
});


Route::prefix('admin')->group(function() {
    // Login Logout
    Route::get('/',  'UserAdminController@login')->name('admin.login');
    Route::post('/', 'UserAdminController@login');

    // logout
    Route::get('/logout', 'UserAdminController@logout')->name('admin.logout');

    Route::get('/forget-password',  'UserPasswordController@forget_password')->middleware('guest')->name('admin.forget_password');
    Route::post('/forget-password', 'UserPasswordController@forget_password')->middleware('guest');

    Route::get('/reset-password/{token}','UserPasswordController@reset_password')->middleware('guest')->name('admin.reset_password');
    Route::post('/reset-password','UserPasswordController@set_reset_password')->middleware('guest')->name('admin.set_reset_password');

    Route::get('/notify','UserPasswordController@notify')->middleware('guest')->name('admin.notify');

}); 

Route::group( [ 'middleware' => ['auth:admin','adminAccessControl','httpLogger']], function(){
    Route::prefix('admin/user')->group(function() {
        // user
        Route::get('/', 'UserAdminController@index')->name('admin.user.user.index');
        Route::get('/datatable_ajax', 'UserAdminController@datatable_ajax')->name('admin.user.user.datatable_ajax') ;

        Route::get('/add', 'UserAdminController@form')->name('admin.user.user.add') ;
        Route::get('/edit/{user_id}', 'UserAdminController@form')->name('admin.user.user.edit') ;
        Route::post('/save', 'UserAdminController@save')->name('admin.user.user.save') ;

        Route::post('/set_status', 'UserAdminController@set_status')->name('admin.user.user.set_status') ;
        Route::post('/set_delete', 'UserAdminController@set_delete')->name('admin.user.user.set_delete') ;

        // user group
        Route::get('/group', 'UserAdminController@group')->name('admin.user.group.index') ;
        Route::get('/group_datatable_ajax', 'UserAdminController@group_datatable_ajax')->name('admin.user.group.datatable_ajax') ;

        Route::get('/group/add', 'UserAdminController@group_form')->name('admin.user.group.add') ;
        Route::get('/group/edit/{group_id}', 'UserAdminController@group_form')->name('admin.user.group.edit') ;
        Route::post('/group/save', 'UserAdminController@group_save')->name('admin.user.group.save') ;
        
        Route::post('/set_group_status', 'UserAdminController@set_group_status')->name('admin.user.group.set_status') ;
        Route::post('/set_group_delete', 'UserAdminController@set_group_delete')->name('admin.user.group.set_delete') ;
        
    });

    Route::prefix('admin/user/role')->group(function() {
        // role
        Route::get('/', 'RoleAdminController@index')->name('admin.user.role.index'); 
        Route::get('/', 'RoleAdminController@index')->name('admin.user.role.index');
        Route::get('/datatable_ajax', 'RoleAdminController@datatable_ajax')->name('admin.user.role.datatable_ajax');

        Route::get('/add', 'RoleAdminController@form')->name('admin.user.role.add');
        Route::get('/edit/{id}', 'RoleAdminController@form')->name('admin.user.role.edit');
        Route::post('/save', 'RoleAdminController@save')->name('admin.user.permroleission.save');
        Route::post('/set_re_order', 'RoleAdminController@set_re_order')->name('admin.user.role.set_re_order');

        Route::post('/set_status', 'RoleAdminController@set_status')->name('admin.user.role.set_status');
        Route::post('/set_delete', 'RoleAdminController@set_delete')->name('admin.user.role.set_delete');

        Route::post('/get_role', 'RoleAdminController@get_role')->name('admin.user.role.get_role');
    });

    // ============================== permission ============================== //
    Route::prefix('admin/user/permission')->group(function() {
        // role
        Route::get('/', 'PermissionAdminController@index')->name('admin.user.permission.index'); 
        Route::get('/', 'PermissionAdminController@index')->name('admin.user.permission.index');
        Route::get('/datatable_ajax', 'PermissionAdminController@datatable_ajax')->name('admin.user.permission.datatable_ajax');

        Route::get('/add', 'PermissionAdminController@form')->name('admin.user.permission.add');
        Route::get('/edit/{id}', 'PermissionAdminController@form')->name('admin.user.permission.edit');
        Route::post('/save', 'PermissionAdminController@save')->name('admin.user.permission.save');
        Route::post('/set_re_order', 'PermissionAdminController@set_re_order')->name('admin.user.permission.set_re_order');

        Route::post('/set_status', 'PermissionAdminController@set_status')->name('admin.user.permission.set_status');
        Route::post('/set_delete', 'PermissionAdminController@set_delete')->name('admin.user.permission.set_delete');

        Route::post('/get_permission', 'PermissionAdminController@get_permission')->name('admin.user.permission.get_permission');
        Route::post('/get_route_name', 'PermissionAdminController@get_route_name')->name('admin.user.permission.get_route_name');
        Route::post('/generate_permission', 'PermissionAdminController@generate_permission')->name('admin.user.permission.generate_permission');
    });
});