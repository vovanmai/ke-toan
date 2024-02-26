<?php
use Illuminate\Support\Facades\Route;


Route::get('{slug}', 'PageController@show')->name('user.page.detail');
