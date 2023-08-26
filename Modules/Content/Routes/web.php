<?php

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

Route::group(['middleware' => 'auth:admin', 'setAdminAccessControl'], function () {

    Route::prefix('admin/content')->group(function () {
        Route::post('/save', 'ContentAdminController@save')->name('admin.content.content.save');
        Route::post('/set_status', 'ContentAdminController@set_status')->name('admin.content.content.set_status');
        Route::post('/set_delete', 'ContentAdminController@set_delete')->name('admin.content.content.set_delete');
        Route::post('/delete_image/', 'ContentAdminController@delete_image')->name('admin.content.content.delete_image');
        Route::post('/sort', 'ContentAdminController@sort')->name('admin.content.content.sort');
        Route::post('/set_re_order', 'ContentAdminController@set_re_order')->name('admin.content.content.set_re_order');
        Route::get('/{type}', 'ContentAdminController@index')->name('admin.content.content.index');
        Route::get('/{type}/datatable_ajax', 'ContentAdminController@datatable_ajax')->name('admin.content.content.datatable_ajax');
        Route::get('/{type}/add', 'ContentAdminController@form')->name('admin.content.content.add');
        Route::get('/{type}/edit/{id}', 'ContentAdminController@form')->name('admin.content.content.edit');
    });
});
