<?php
use Illuminate\Support\Facades\Route;

Route::prefix('support-and-consultation')->group(function () {
    Route::get('', 'SupportAndConsultationController@index')->name('admin.consultation.list');
    Route::post('mark-read', 'SupportAndConsultationController@markRead')->name('admin.consultation.mark_read');
});
