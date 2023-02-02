<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->namespace('Phont\Frontend\Controllers')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/{slug}', 'HomeController@level1')->name('level1');
    Route::get('/{object}/{slug}', 'HomeController@level2')->name('level2');
    // Route::post('/received', 'HomeController@received')->name('received');
    // Route::post('/receivedWithReCaptcha', 'HomeController@receivedWithReCaptcha')->name('receivedWithReCaptcha');
    // Route::post('/order', 'HomeController@order')->name('order');
    // Route::post('/takeModalRequest', 'HomeController@takeModalRequest')->name('takeModalRequest');
});
