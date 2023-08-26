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
// Route::get('/getContactSubject', 'ContactUsController@getContactSubject')->name('contactus.contactus.getContactSubject') ;

Route::group(['middleware' => 'auth:admin', 'setAdminAccessControl'], function () {
    Route::prefix('admin/contactus')->group(function () {
        Route::get('/', 'ContactUsAdminController@index')->name('admin.contactus.contact.index');
        Route::get('/datatable_ajax', 'ContactUsAdminController@datatable_ajax')->name('admin.contactus.contact.datatable_ajax');
        Route::get('/edit/{category_id}', 'ContactUsAdminController@form')->name('admin.contactus.contact.edit');

        Route::post('/save', 'ContactUsAdminController@save')->name('admin.contactus.contact.save');

        Route::post('/set_status', 'ContactUsAdminController@set_status')->name('admin.contactus.contact.set_status');
        // Route::post('/set_delete', 'ContactUsAdminController@set_delete')->name('admin.contactus.contact.set_delete');

        Route::prefix('page')->group(function () {
            Route::get('/edit', 'ContactPageAdminController@form')->name('admin.contactus.page.edit');
            Route::post('/save', 'ContactPageAdminController@save')->name('admin.contactus.page.save');
        });

        // Route::prefix('subject')->group(function () {
        //     Route::get('/', 'ContactSubjectAdminController@index')->name('admin.contactus.subject.index');
        //     Route::get('/datatable_ajax', 'ContactSubjectAdminController@datatable_ajax')->name('admin.contactus.subject.datatable_ajax');
        //     Route::get('/edit/{category_id}', 'ContactSubjectAdminController@form')->name('admin.contactus.subject.edit');
            
        //     Route::get('/add', 'ContactSubjectAdminController@form')->name('admin.contactus.subject.add');
        //     Route::post('/save', 'ContactSubjectAdminController@save')->name('admin.contactus.subject.save');

        //     Route::post('/set_status', 'ContactSubjectAdminController@set_status')->name('admin.contactus.subject.set_status');
        //     Route::post('/set_delete', 'ContactSubjectAdminController@set_delete')->name('admin.contactus.subject.set_delete');
        //     Route::post('/set_re_order', 'ContactSubjectAdminController@set_re_order')->name('admin.contactus.subject.set_re_order');
        // });
        Route::prefix('branch')->group(function () {
            Route::get('/', 'ContactBranchAdminController@index')->name('admin.contactus.branch.index');
            Route::get('/datatable_ajax', 'ContactBranchAdminController@datatable_ajax')->name('admin.contactus.branch.datatable_ajax');
            Route::get('/edit/{category_id}', 'ContactBranchAdminController@form')->name('admin.contactus.branch.edit');

            Route::get('/add', 'ContactBranchAdminController@form')->name('admin.contactus.branch.add');

            Route::post('/save', 'ContactBranchAdminController@save')->name('admin.contactus.branch.save');

            Route::post('/set_status', 'ContactBranchAdminController@set_status')->name('admin.contactus.branch.set_status');
            // Route::post('/set_delete', 'ContactBranchAdminController@set_delete')->name('admin.contactus.branch.set_delete');
            Route::post('/set_re_order', 'ContactBranchAdminController@set_re_order')->name('admin.contactus.branch.set_re_order');
        });
    });
});
