<?php
use Illuminate\Support\Facades\Route;


Route::prefix('bai-viet')->group(function () {
    Route::get('{slug}.html', 'PostController@show')->name('user.post.detail');
});
