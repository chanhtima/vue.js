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
    Route::prefix('admin/mwz')->group(function() {
        Route::get('/get_province/{type}', 'MwzAdminController@getProvince')->name('admin.mwz.address.province') ;

        Route::get('/get_city/{type}/{province_id}', 'MwzAdminController@getCity')->name('admin.mwz.address.city') ;

        Route::get('/get_city_full/{type}/{province_id}', 'MwzAdminController@getCityFull')->name('admin.mwz.address.cityfull') ;

        Route::get('/get_districe/{type}/{city_id}', 'MwzAdminController@getDistrict')->name('admin.mwz.address.district') ;

        Route::get('/get_districe_full/{type}/{city_id}', 'MwzAdminController@getDistrictFull')->name('admin.mwz.address.districtfull') ;

        Route::get('/get_address_by_zipcode/{type}/{zipcode}', 'MwzAdminController@getAddressByZipcode')->name('admin.mwz.address.districtzipcode') ;

        Route::get('/get_tin/{tax_id}', 'MwzAdminController@getTIN')->name('admin.mwz.rd.tin') ;

        Route::post('/multifiles/upload', 'MwzAdminController@multifiles_upload')->name('admin.master.multifiles.upload') ;

    });

    Route::prefix('admin/slug')->group(function() {
        Route::get('/', 'SlugAdminController@index')->name('admin.mwz.slug.index');
        Route::get('/datatable_ajax', 'SlugAdminController@datatable_ajax')->name('admin.mwz.slug.datatable_ajax'); 
        Route::get('/add', 'SlugAdminController@form')->name('admin.mwz.slug.add');
        Route::get('/edit/{uid}', 'SlugAdminController@form')->name('admin.mwz.slug.edit');
        Route::post('/save', 'SlugAdminController@save')->name('admin.mwz.slug.save');
        Route::post('/set_delete', 'SlugAdminController@set_delete')->name('admin.mwz.slug.set_delete');
        Route::get('/generate/sitemap', 'SlugAdminController@generate_sitemap')->name('admin.mwz.slug.sitemap');
        Route::post('/get_slug', 'SlugController@get_slug')->name('admin.mwz.slug.get_slug');
    });

    Route::prefix('admin/tag')->group(function() {
        Route::get('/', 'TagAdminController@index')->name('admin.mwz.tag.index');
        Route::get('/datatable_ajax', 'TagAdminController@datatable_ajax')->name('admin.mwz.tag.datatable_ajax');

        Route::get('/add', 'TagAdminController@form')->name('admin.mwz.tag.add');

        Route::get('/edit/{id}', 'TagAdminController@form')->name('admin.mwz.tag.edit');
        Route::post('/save', 'TagAdminController@save')->name('admin.mwz.tag.save');

        Route::post('/set_status', 'TagAdminController@set_status')->name('admin.mwz.tag.set_status');
        Route::post('/set_delete', 'TagAdminController@set_delete')->name('admin.mwz.tag.set_delete');
            
    });

});
       

Route::group(['middleware' => 'setlocale'], function() {

    Route::prefix('mwz')->group(function() {
        Route::get('/get_province/{type}', 'MwzController@getProvince')->name('mwz.front.address.province') ;

        Route::get('/get_city/{type}/{province_id}', 'MwzController@getCity')->name('mwz.front.address.city') ;

        Route::get('/get_city_full/{type}/{province_id}', 'MwzController@getCityFull')->name('mwz.front.address.cityfull') ;

        Route::get('/get_districe/{type}/{city_id}', 'MwzController@getDistrict')->name('mwz.front.address.district') ;

        Route::get('/get_districe_full/{type}/{city_id}', 'MwzController@getDistrictFull')->name('mwz.front.address.districtfull') ;

        Route::get('/get_address_by_zipcode/{type}/{zipcode}', 'MwzController@getAddressByZipcode')->name('mwz.front.address.districtzipcode') ;

        Route::get('/get_tin/{tax_id}', 'MwzController@getTIN')->name('admin.front.mwz.rd.tin') ;

        Route::post('/multifiles/upload', 'MwzController@multifiles_upload')->name('master.front.multifiles.upload') ;
    });

});

Route::group(['prefix' => '{locale?}', 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => 'setlocale'], function() {
    Route::prefix('mwz')->group(function() {
        Route::get('/get_province/{type}', 'MwzController@getProvince')->name('lang.mwz.address.province') ;

        Route::get('/get_city/{type}/{province_id}', 'MwzController@getCity')->name('lang.mwz.address.city') ;

        Route::get('/get_city_full/{type}/{province_id}', 'MwzController@getCityFull')->name('lang.mwz.address.cityfull') ;

        Route::get('/get_districe/{type}/{city_id}', 'MwzController@getDistrict')->name('lang.mwz.address.district') ;

        Route::get('/get_districe_full/{type}/{city_id}', 'MwzController@getDistrictFull')->name('lang.mwz.address.districtfull') ;

        Route::get('/get_address_by_zipcode/{type}/{zipcode}', 'MwzController@getAddressByZipcode')->name('lang.mwz.address.districtzipcode') ;

        Route::get('/get_tin/{tax_id}', 'MwzController@getTIN')->name('lang.mwz.rd.tin') ;

        Route::post('/multifiles/upload', 'MwzController@multifiles_upload')->name('lang.master.multifiles.upload') ;
    });
});





Route::group(['middleware' => 'auth:admin'], function () {
    // ============================== admin_menu admin ============================== //
    Route::prefix('admin/admin_menu')->group(function () {
        Route::get('/', 'AdminMenusAdminController@index')->name('admin.admin_menu.admin_menu.index');
        Route::get('/datatable_ajax', 'AdminMenusAdminController@datatable_ajax')->name('admin.admin_menu.admin_menu.datatable_ajax');

        Route::get('/add', 'AdminMenusAdminController@form')->name('admin.admin_menu.admin_menu.add');
        Route::get('/edit/{category_id}', 'AdminMenusAdminController@form')->name('admin.admin_menu.admin_menu.edit');
        Route::post('/save', 'AdminMenusAdminController@save')->name('admin.admin_menu.admin_menu.save');

        Route::post('/sort', 'AdminMenusAdminController@sort')->name('admin.admin_menu.admin_menu.sort');
        Route::post('/set_move_node', 'AdminMenusAdminController@set_move_node')->name('admin.admin_menu.admin_menu.set_move_node');
        
        Route::post('/set_status', 'AdminMenusAdminController@set_status')->name('admin.admin_menu.admin_menu.set_status');
        Route::post('/set_delete', 'AdminMenusAdminController@set_delete')->name('admin.admin_menu.admin_menu.set_delete');

        Route::post('/get_category', 'AdminMenusAdminController@get_category')->name('admin.admin_menu.admin_menu.get_category');

    });

});

Route::prefix('admin/user')->group(function() {
    Route::post('/get_permission', 'AdminMenusAdminController@get_permission')->name('admin.user.user.get_permission');
});