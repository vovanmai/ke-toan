<?php
use Illuminate\Support\Facades\Route;

Route::prefix('document-categories')->group(function () {
    Route::get('', 'DocumentCategoryController@all')->name('admin.document_category.list');
    Route::get('create', 'DocumentCategoryController@create')->name('admin.document_category.create');
    Route::post('create', 'DocumentCategoryController@store')->name('admin.document_category.store');
    Route::get('{id}/edit', 'DocumentCategoryController@edit')->name('admin.document_category.edit');
    Route::put('{id}', 'DocumentCategoryController@update')->name('admin.document_category.update');
    Route::delete('{id}', 'DocumentCategoryController@destroy')->name('admin.document_category.destroy');
});
