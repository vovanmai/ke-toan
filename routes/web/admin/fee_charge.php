<?php
use Illuminate\Support\Facades\Route;

Route::prefix('fee-charge')->group(function () {
    Route::get('', 'FeeChargeController@create')->name('admin.fee_charge.index');
    Route::post('', 'FeeChargeController@store')->name('admin.fee_charge.store');
});
