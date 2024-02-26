<?php
use Illuminate\Support\Facades\Route;


Route::namespace("User\User4")->middleware(['request.log'])->group(function () {
    Route::get('', 'IndexController@index')->name('user.index');
    Route::get('lien-he', 'ContactController@index')->name('user.contact');
    Route::get('tin-tuc', 'PostController@index')->name('user.post');
    Route::get('gia-ve', 'TicketController@index')->name('user.ticket');

    Route::get('not-found', function () {
        return view('user.user4.not-found');
    })->name('user.not_found');
});
