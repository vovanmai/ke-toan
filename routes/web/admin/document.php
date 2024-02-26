<?php
use Illuminate\Support\Facades\Route;

Route::prefix('documents')->group(function () {
    Route::get('', 'DocumentController@index')->name('admin.document.list');
    Route::get('create', 'DocumentController@create')->name('admin.document.create');
    Route::post('create', 'DocumentController@store')->name('admin.document.store');
    Route::get('{id}/edit', 'DocumentController@edit')->name('admin.document.edit');
    Route::put('{id}', 'DocumentController@update')->name('admin.document.update');
    Route::post('{id}/active', 'DocumentController@changeActive')->name('admin.document.active');
    Route::delete('{id}', 'DocumentController@destroy')->name('admin.document.destroy');
});
