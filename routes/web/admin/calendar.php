<?php
use Illuminate\Support\Facades\Route;

Route::prefix('calendars')->group(function () {
    Route::get('', 'CalendarController@index')->name('admin.calendar.list');
});
