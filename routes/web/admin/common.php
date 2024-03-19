<?php
use Illuminate\Support\Facades\Route;

Route::post('upload-file', 'CommonController@uploadFile')->name('admin.common.upload_file');
Route::post('upload-from-ckeditor', 'CommonController@uploadFromCkeditor')->name('admin.common.upload_from_ckeditor');
Route::delete('delete-file', 'CommonController@deleteFile')->name('admin.common.delete_file');
