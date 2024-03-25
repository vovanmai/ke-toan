<?php
use Illuminate\Support\Facades\Route;

Route::prefix('request-logs')->group(function () {
    Route::get('', 'RequestLogController@index')->name('admin.request_log.list');
});
