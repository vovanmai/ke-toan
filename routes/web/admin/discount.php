<?php
use Illuminate\Support\Facades\Route;

Route::prefix('discounts')->group(function () {
    Route::get('', 'DiscountController@index')->name('admin.discount.list');
    Route::post('', 'DiscountController@store')->name('admin.discount.store');
    Route::get('{id}', 'DiscountController@show')->name('admin.discount.show');
    Route::put('{id}', 'DiscountController@update')->name('admin.discount.update');
    Route::delete('{id}', 'DiscountController@destroy')->name('admin.discount.destroy');
});
