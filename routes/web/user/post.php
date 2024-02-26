<?php
use Illuminate\Support\Facades\Route;


Route::prefix('')->group(function () {
    Route::get('{slug}.html', 'PostController@show')->name('user.post.detail');
    Route::get('tim-kiem', 'PostController@search')->name('user.post.search');
});
