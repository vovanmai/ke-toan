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

// Routes of admin
require __DIR__ . '/web/admin/index.php';

if (config('define.user_page') == 'user1') {
    // Routes of user1
    require __DIR__ . '/web/user/user1/index.php';
} else if (config('define.user_page') == 'user2') {
    // Routes of user2
    require __DIR__ . '/web/user/user2/index.php';
} else if (config('define.user_page') == 'user3') {
    // Routes of user2
    require __DIR__ . '/web/user/user3/index.php';
} else if (config('define.user_page') == 'user4') {
    // Routes of user2
    require __DIR__ . '/web/user/user4/index.php';
}
