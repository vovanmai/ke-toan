<?php
use Illuminate\Support\Facades\Route;


Route::namespace("User\User2")->group(function () {
    Route::get('login', 'AuthenticateController@loginView')->name('user.login');
    Route::post('register', 'AuthenticateController@register')->name('user.register');
    Route::post('login', 'AuthenticateController@login')->name('user.login');
    Route::get('logout', 'AuthenticateController@logout')->name('user.logout');
    Route::get('account/verify', 'AuthenticateController@verify')->name('user.verify');
    Route::get('ve-chung-toi', function () {
        return view('user.user2.about-us', [
            'websiteTitle' => 'Về chúng tôi'
        ]);
    })->name('user.about_us');

    Route::get('', 'IndexController@index')->name('user.index');

    // Routes of contact
    require __DIR__ . '/contact.php';

    // Routes of recruitment
    require __DIR__ . '/recruitment.php';

    // Routes of category
    require __DIR__ . '/category.php';

    // Routes of post
    require __DIR__ . '/post.php';

    // Routes of post
    require __DIR__ . '/document.php';

    // Routes of course
    require __DIR__ . '/course.php';

    // Routes of comment
    require __DIR__ . '/comment.php';

    // Routes of error
    require __DIR__ . '/error.php';
});