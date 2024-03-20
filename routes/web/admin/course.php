<?php
use Illuminate\Support\Facades\Route;

Route::prefix('courses')->group(function () {
    Route::get('', 'CourseController@index')->name('admin.course.list');

    Route::get('create', 'CourseController@create')->name('admin.course.create');
    Route::post('', 'CourseController@store')->name('admin.course.store');

    Route::get('{id}/edit', 'CourseController@edit')->name('admin.course.edit');
    Route::post('{id}', 'CourseController@update')->name('admin.course.update');

    Route::delete('{id}', 'CourseController@destroy')->name('admin.course.destroy');
    Route::post('{id}/active', 'CourseController@changeActive')->name('admin.course.active');
});
