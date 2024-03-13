<?php
use Illuminate\Support\Facades\Route;

Route::prefix('course-categories')->group(function () {
    Route::get('', 'CourseCategoryController@index')->name('admin.course_category.list');
    Route::get('create', 'CourseCategoryController@create')->name('admin.course_category.create');
    Route::post('create', 'CourseCategoryController@store')->name('admin.course_category.store');
    Route::post('{id}/active', 'CourseCategoryController@changeActive')->name('admin.course_category.active');
    Route::get('{id}/edit', 'CourseCategoryController@edit')->name('admin.course_category.edit');
    Route::put('{id}', 'CourseCategoryController@update')->name('admin.course_category.update');
    Route::delete('{id}', 'CourseCategoryController@destroy')->name('admin.course_category.destroy');
});
