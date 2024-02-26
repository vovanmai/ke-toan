<?php
use Illuminate\Support\Facades\Route;


Route::prefix('recruitments')->group(function () {
    Route::get('', 'RecruitmentController@index')->name('user.recruitment.index');
    Route::get('{slug}.html', 'RecruitmentController@show')->name('user.recruitment.detail');
});
