<?php
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function () {
    Route::get('', 'CategoryController@index')->name('admin.category.list');
    Route::get('create', 'CategoryController@create')->name('admin.category.create');
    Route::post('create', 'CategoryController@store')->name('admin.category.store');
    Route::post('{id}/active', 'CategoryController@changeActive')->name('admin.category.active');
    Route::get('{id}/edit', 'CategoryController@edit')->name('admin.category.edit');
    Route::put('{id}', 'CategoryController@update')->name('admin.category.update');
    Route::delete('{id}', 'CategoryController@destroy')->name('admin.category.destroy');
});
