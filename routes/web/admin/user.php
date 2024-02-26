<?php
use Illuminate\Support\Facades\Route;

Route::prefix('users')->group(function () {
    Route::get('', 'UserController@index')->name('admin.user.list');
});
