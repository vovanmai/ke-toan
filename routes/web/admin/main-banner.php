<?php
use Illuminate\Support\Facades\Route;

Route::prefix('main-banners')->group(function () {
    Route::get('', 'MainBannerController@index')->name('admin.main_banner.list');

    Route::get('create', 'MainBannerController@create')->name('admin.main_banner.create');
    Route::post('', 'MainBannerController@store')->name('admin.main_banner.store');

    Route::get('{id}/edit', 'MainBannerController@edit')->name('admin.main_banner.edit');
    Route::put('{id}', 'MainBannerController@update')->name('admin.main_banner.update');

    Route::delete('{id}', 'MainBannerController@destroy')->name('admin.main_banner.destroy');
    Route::post('{id}/active', 'MainBannerController@changActive')->name('admin.main_banner.active');
});
