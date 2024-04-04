<?php
use Illuminate\Support\Facades\Route;

Route::prefix('main-menu')->group(function () {
    Route::get('', 'MainMenuController@index')->name('admin.main_menu.index');
    Route::post('', 'MainMenuController@update')->name('admin.main_menu.update');
});
