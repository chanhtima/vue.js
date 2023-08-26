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


use Illuminate\Support\Facades\Route;

Route::prefix('dev/product')->group(function () {
    Route::get('/get_product/{product_id}', 'ProductController@getProduct')->name('dev.product.get_product');
    Route::get('/get_products/{category_id}', 'ProductController@getProducts')->name('dev.product.get_products');
    Route::get('/get_price_color_size/{product_id}/{size}/{color}', 'ProductController@getProductPriceByColorSize')->name('dev.product.get_price_color_size');
    Route::get('/get_price_item_id/{product_item_id}', 'ProductController@getProductPriceByItemID')->name('dev.product.get_price_item_id');
});

// Route::group(['middleware' => 'setlocale'], function() {
Route::prefix('product')->group(function () {
    Route::post('/search/autocomplete', 'ProductController@searchProductAutocomplete')->name('product.search.autocomplete');
});
// });


Route::group(['middleware' => 'auth:admin'], function () {
    Route::prefix('admin/product')->group(function () {

        // ============================== product ============================== //
        Route::prefix('list')->group(function () {
            Route::get('/', 'ProductAdminController@index')->name('admin.product.list.index');
            Route::get('/datatable_ajax', 'ProductAdminController@datatable_ajax')->name('admin.product.list.datatable_ajax');

            Route::get('/add', 'ProductAdminController@form')->name('admin.product.list.add');
            Route::get('/edit/{product_id}', 'ProductAdminController@form')->name('admin.product.list.edit');
            Route::post('/save', 'ProductAdminController@save')->name('admin.product.list.save');

            Route::post('/set_re_order', 'ProductAdminController@set_re_order')->name('admin.product.list.set_re_order');

            Route::post('/set_status', 'ProductAdminController@set_status')->name('admin.product.list.set_status');
            Route::post('/set_delete', 'ProductAdminController@set_delete')->name('admin.product.list.set_delete');

            Route::post('/filter', 'ProductAdminController@filter')->name('admin.product.list.filter');
            Route::post('/save_image_multi', 'ProductAdminController@save_image_multi')->name('admin.product.list.save_image_multi');
            Route::post('/set_related_product', 'ProductAdminController@set_related_product')->name('admin.product.list.set_related_product');

            Route::post('/search_category_brand', 'ProductAdminController@search_category_brand')->name('admin.product.list.search_category_brand');
            Route::post('/delete_image', 'ProductAdminController@delete_image')->name('admin.product.list.delete_image');
            
        });
    });
});
