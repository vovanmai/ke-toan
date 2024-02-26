<?php
use Illuminate\Support\Facades\Route;

Route::prefix('comments')->group(function () {
    Route::get('', 'CommentController@index')->name('admin.comment.list');
    Route::post('{id}/update-status', 'CommentController@changeStatus')->name('admin.comment.change_status');
    Route::post('mark-as-read', 'CommentController@markRead')->name('admin.comment.mark_read');
});
