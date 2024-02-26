<?php
use Illuminate\Support\Facades\Route;


Route::prefix('thong-tin-khoa-hoc')->group(function () {
    Route::get('', 'CourseController@index')->name('user.course.index');
    Route::get('{slug}.html', 'CourseController@show')->name('user.course.detail');
});
