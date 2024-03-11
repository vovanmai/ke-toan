<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('link', function () {
    Artisan::call('storage:link');
    return 'Status: ok';
});

Route::get('optimize', function () {
    Artisan::call('config:cache');
    Artisan::call('event:cache');
    Artisan::call('route:cache');
    Artisan::call('view:cache');
    return 'Status: ok';
});

Route::get('clear', function () {
    Artisan::call('config:clear');
    Artisan::call('event:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Status: ok';
});

Route::get('test', function () {
    return view('welcome');
});

// Routes of admin
require __DIR__ . '/web/admin/index.php';

// Routes of user2
require __DIR__ . '/web/user/index.php';

