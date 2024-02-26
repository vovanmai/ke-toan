<?php
use Illuminate\Support\Facades\Route;

Route::prefix('contacts')->group(function () {
    Route::get('', 'ContactController@index')->name('admin.contact.list');
    Route::post('mark-read', 'ContactController@markRead')->name('admin.contact.mark_read');
});
