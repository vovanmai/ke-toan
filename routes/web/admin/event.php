<?php
use Illuminate\Support\Facades\Route;

Route::prefix('events')->group(function () {
    Route::post('', 'EventController@store');
});
