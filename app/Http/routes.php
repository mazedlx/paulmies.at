<?php
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'ContentController@index');
    Route::get('/admin', 'AdministrationController@index');
    Route::resource('/admin/contents', 'ContentController');
    Route::resource('/admin/uploads', 'UploadController');
    Route::resource('/admin/settings', 'SettingController');
    Route::resource('/admin/slides', 'SlideController');
    Route::post('/inquiry', 'ContentController@inquiry')->name('inquiry');

    Route::auth();

    Route::get('/admin/contents', 'AdministrationController@contents');
});
