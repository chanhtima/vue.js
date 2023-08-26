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

Route::group(['middleware' => 'httpAccessLogFile'], function () {
    Route::post('/catalog/get', 'ApiContentController@API_getContent')->name('api.catalog.get');
    Route::post('/saving/get', 'ApiContentController@API_getContent')->name('api.saving.get');
    Route::post('/news/get', 'ApiContentController@API_getContent')->name('api.news.get');
    Route::post('/faq/get', 'ApiContentController@API_getContent')->name('api.faq.get');
    Route::post('/blog/get', 'ApiContentController@API_getContent')->name('api.blog.get');
    Route::post('/blogs/get', 'ApiContentController@API_getContentByCategory')->name('api.blogs.get');
});