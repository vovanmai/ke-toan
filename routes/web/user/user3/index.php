<?php
use Illuminate\Support\Facades\Route;


Route::namespace("User\User3")->group(function () {
    Route::get('', 'IndexController@index')->name('user.index');
    Route::get('test', function () {
        dispatch(new \App\Jobs\TestJob());
        dd(89898);
    });
});
