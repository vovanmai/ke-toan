<?php
use Illuminate\Support\Facades\Route;

Route::get('not-found', function () {
    return view('user.user1.error.not_found');
})->name('user.error.not_found');

Route::get('error', function () {
    return view('user.user1.error.error');
})->name('user.error.error');

Route::get('permission', function () {
    return view('user.user1.error.permission');
})->name('user.error.forbidden');
