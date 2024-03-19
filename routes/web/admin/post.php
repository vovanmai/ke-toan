<?php
use Illuminate\Support\Facades\Route;

Route::prefix('posts')->group(function () {
    Route::get('', 'PostController@index')->name('admin.post.list');
    Route::get('create', 'PostController@create')->name('admin.post.create');
    Route::post('', 'PostController@store')->name('admin.post.store');
    Route::get('{id}/edit', 'PostController@edit')->name('admin.post.edit');
    Route::post('{id}', 'PostController@update')->name('admin.post.update');
    Route::post('{id}/active', 'PostController@changeActive')->name('admin.post.active');
    Route::delete('{id}', 'PostController@destroy')->name('admin.post.destroy');
});
