<?php
use Illuminate\Support\Facades\Route;

Route::prefix('course-images')->group(function () {
    Route::get('', 'CourseImageController@index')->name('admin.course_image.list');
    Route::post('', 'CourseImageController@store')->name('admin.course_image.store');
    Route::delete('{id}', 'CourseImageController@destroy')->name('admin.course_image.delete');
});
