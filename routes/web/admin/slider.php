<?php
use Illuminate\Support\Facades\Route;

Route::prefix('sliders')->group(function () {
    Route::get('', 'SliderController@index')->name('admin.slider.list');

    Route::get('create', 'SliderController@create')->name('admin.slider.create');
    Route::post('', 'SliderController@store')->name('admin.slider.store');

    Route::get('{id}/edit', 'SliderController@edit')->name('admin.slider.edit');
    Route::put('{id}', 'SliderController@update')->name('admin.slider.update');

    Route::delete('{id}', 'SliderController@destroy')->name('admin.slider.destroy');
    Route::post('{id}/active', 'SliderController@changActive')->name('admin.slider.active');
});
