<?php
use Illuminate\Support\Facades\Route;

Route::prefix('post-categories')->group(function () {
    Route::get('', 'PostCategoryController@all')->name('admin.post_category.list');
    Route::get('create', 'PostCategoryController@create')->name('admin.post_category.create');
    Route::post('create', 'PostCategoryController@store')->name('admin.post_category.store');
    Route::get('{id}/edit', 'PostCategoryController@edit')->name('admin.post_category.edit');
    Route::put('{id}', 'PostCategoryController@update')->name('admin.post_category.update');
    Route::delete('{id}', 'PostCategoryController@destroy')->name('admin.post_category.destroy');
});
