<?php
use Illuminate\Support\Facades\Route;

Route::prefix('recruitments')->group(function () {
    Route::get('', 'RecruitmentController@index')->name('admin.recruitment.list');

    Route::get('create', 'RecruitmentController@create')->name('admin.recruitment.create');

    Route::post('', 'RecruitmentController@store')->name('admin.recruitment.store');

    Route::post('{id}/active', 'RecruitmentController@changeActive')->name('admin.recruitment.active');

    Route::get('{id}/edit', 'RecruitmentController@edit')->name('admin.recruitment.edit');

    Route::put('{id}', 'RecruitmentController@update')->name('admin.recruitment.update');

    Route::delete('{id}', 'RecruitmentController@destroy')->name('admin.recruitment.destroy');
});
