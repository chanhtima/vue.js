<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/user/register', 'PassportAuthController@register')->name('api.user.register');
Route::post('/user/login', 'PassportAuthController@login')->name('api.user.login');

Route::group( [ 'middleware' => 'auth:api' ], function(){
    Route::prefix('/user')->group(function() {
        Route::POST('/get_user', 'UserController@get_user')->name('api.user.user.get_user') ;
    });
});