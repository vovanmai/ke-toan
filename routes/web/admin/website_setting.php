<?php
use Illuminate\Support\Facades\Route;

Route::prefix('website-setting')->group(function () {
    Route::get('create', 'WebsiteSettingController@create')->name('admin.website_setting.create');
    Route::post('', 'WebsiteSettingController@store')->name('admin.website_setting.store');
});
