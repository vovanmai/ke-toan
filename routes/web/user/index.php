<?php
use Illuminate\Support\Facades\Route;


Route::namespace("User")->group(function () {
    // Routes of error
    require __DIR__ . '/error.php';

    // Route index
    Route::get('', 'IndexController@index')->name('user.index');

    require __DIR__ . '/recruitment.php';

    require __DIR__ . '/category.php';

    require __DIR__ . '/post.php';

    require __DIR__ . '/page.php';
});
