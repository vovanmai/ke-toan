<?php
use Illuminate\Support\Facades\Route;

Route::namespace("Admin")->middleware('guard:admin')->prefix('admin')->group(function () {
    Route::post('login', 'AuthController@login')->name('admin.login');
    Route::get('login', 'AuthController@loginView')->name('admin.login_view');
    Route::middleware(['auth', 'permission', 'active'])->group(function () {
        Route::get('logout', 'AuthController@logout')->name('admin.logout');

        // Routes of common
        require __DIR__ . '/common.php';

        // Routes of admin
        require __DIR__ . '/admin.php';

        // Routes of category
        require __DIR__ . '/category.php';

        // Routes of post
        require __DIR__ . '/post.php';

        // Routes of category
        require __DIR__ . '/course-category.php';

        // Routes of post
        require __DIR__ . '/course.php';

        // Routes of post
        require __DIR__ . '/main-banner.php';

        // Routes of error
        require __DIR__ . '/error.php';


        // Routes of website setting
        require __DIR__ . '/website_setting.php';

        // Routes of post
        require __DIR__ . '/page.php';

        // Routes of post
        require __DIR__ . '/support-and-consultation.php';
    });
});
