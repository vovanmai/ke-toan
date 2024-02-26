<?php
use Illuminate\Support\Facades\Route;

Route::prefix('event-options')->group(function () {
    Route::post('', 'EventOptionController@store');
});
