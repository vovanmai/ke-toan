<?php
use Illuminate\Support\Facades\Route;

Route::namespace("Admin")->middleware('guard:admin')->prefix('admin')->group(function () {
    Route::post('login', 'AuthController@login')->name('admin.login');
    Route::get('login', 'AuthController@loginView')->name('admin.login_view');
    Route::middleware(['auth', 'permission', 'active'])->group(function () {
        Route::get('logout', 'AuthController@logout')->name('admin.logout');
        Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

        // Routes of common
        require __DIR__ . '/common.php';

        // Routes of admin
        require __DIR__ . '/admin.php';

        // Routes of category
        require __DIR__ . '/category.php';

        // Routes of error
        require __DIR__ . '/error.php';

        // Routes of product
        require __DIR__ . '/product.php';

        // Routes of discount
        require __DIR__ . '/discount.php';

        // Routes of calendar
        require __DIR__ . '/calendar.php';

        // Routes of event options
        require __DIR__ . '/event_option.php';

        // Routes of event
        require __DIR__ . '/event.php';

        // Routes of recruitment
        require __DIR__ . '/recruitment.php';

        // Routes of website setting
        require __DIR__ . '/website_setting.php';

        // Routes of post category
        require __DIR__ . '/post-category.php';

        // Routes of post
        require __DIR__ . '/post.php';


        // Routes of post
        require __DIR__ . '/page.php';


        // Routes of comment
        require __DIR__ . '/comment.php';

        // Routes of slider
        require __DIR__ . '/slider.php';

        // Routes of order
        require __DIR__ . '/order.php';

        // Routes of fee charge
        require __DIR__ . '/fee_charge.php';

        // Routes of user
        require __DIR__ . '/user.php';

        // Routes of contact
        require __DIR__ . '/contact.php';

        // Routes of course
        require __DIR__ . '/course.php';

        // Routes of document category
        require __DIR__ . '/document-category.php';

        // Routes of document
        require __DIR__ . '/document.php';
    });
});
