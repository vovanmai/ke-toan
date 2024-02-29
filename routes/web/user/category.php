<?php
use Illuminate\Support\Facades\Route;


Route::prefix('danh-muc')->group(function () {
    Route::get('{slug}', 'PostController@index')->name('user.category.index');
});
