<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->namespace('Phont\Frontend\Controllers')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/{slug}', 'HomeController@level1')->name('level1');
    Route::get('/{object}/{slug}', 'HomeController@level2')->name('level2');
});
