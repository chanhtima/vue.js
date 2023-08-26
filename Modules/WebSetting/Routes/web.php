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
    Route::prefix('admin/websetting')->group(function () {
        Route::get('/edit', 'WebSettingAdminController@form')->name('admin.setting.websetting.edit');
        Route::post('/save', 'WebSettingAdminController@save')->name('admin.setting.websetting.save');

        Route::get('/form_privacy/1', 'WebSettingAdminController@form_privacy')->name('admin.setting.form_privacy.edit');
        Route::post('/save_privacy', 'WebSettingAdminController@save_privacy')->name('admin.setting.form_privacy.save');
        Route::post('/delete_image', 'WebSettingAdminController@delete_image')->name('admin.setting.delete_image');

        Route::prefix('/slug')->group(function () {
            Route::get('/index', 'SlugAdminController@index')->name('admin.setting.slug.index');
            Route::get('/datatable_ajax', 'SlugAdminController@datatable_ajax')->name('admin.setting.slug.datatable_ajax');

            Route::get('/edit/{uid}', 'SlugAdminController@form')->name('admin.setting.slug.edit');
            Route::post('/save', 'SlugAdminController@save')->name('admin.setting.slug.save');

            Route::post('/set_delete', 'SlugAdminController@set_delete')->name('admin.setting.slug.set_delete');

            Route::get('/generate/sitemap', 'SlugAdminController@generate_sitemap')->name('admin.setting.slug.sitemap');
        });
        Route::prefix('/tag')->group(function () {
            Route::get('/index', 'TagAdminController@index')->name('admin.setting.tag.index');
            Route::get('/datatable_ajax', 'TagAdminController@datatable_ajax')->name('admin.setting.tag.datatable_ajax');

            Route::get('/add', 'TagAdminController@form')->name('admin.setting.tag.add');

            Route::get('/edit/{id}', 'TagAdminController@form')->name('admin.setting.tag.edit');
            Route::post('/save', 'TagAdminController@save')->name('admin.setting.tag.save');

            Route::post('/set_status', 'TagAdminController@set_status')->name('admin.setting.tag.set_status');
            Route::post('/set_delete', 'TagAdminController@set_delete')->name('admin.setting.tag.set_delete');
        });
    });
});
