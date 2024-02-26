<?php
use Illuminate\Support\Facades\Route;

Route::prefix('orders')->group(function () {
    Route::get('', 'OrderController@index')->name('admin.order.list');
    Route::get('{id}', 'OrderController@show')->name('admin.order.detail');
    Route::post('{id}/update-status', 'OrderController@updateStatus')->name('admin.order.update_status');
});
