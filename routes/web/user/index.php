<?php
use Illuminate\Support\Facades\Route;


Route::namespace("User")->group(function () {
    // Routes of error
    require __DIR__ . '/error.php';
    require __DIR__ . '/page.php';

    // Route index
    Route::get('', 'IndexController@index')->name('user.index');

    Route::post('support-and-consultation', 'SupportAndConsultationController@store');

    require __DIR__ . '/category.php';

    require __DIR__ . '/post.php';
});
