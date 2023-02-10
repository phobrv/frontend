<?php

use Illuminate\Support\Facades\Route;

Route::post('/api/send-mail', 'Phont\Frontend\Controllers\Api\ApiSendMailController@SendMail')->name('api.sentMail');

Route::middleware('web')->namespace('Phont\Frontend\Controllers\Api')->group(function () {
    Route::get('/checkout', 'CartController@checkout')->name('checkout');
    Route::get('/cancel/{id}', 'CartController@cancel')->name('cancel');
    Route::get('/success/{id}', 'CartController@success')->name('success');
});
Route::middleware('web')->prefix('api')->namespace('Phont\Frontend\Controllers\Api')->group(function () {
    //Checkout
    Route::post('/placeOrder', 'CartController@placeOrder')->name('api.placeOrder');
    Route::post('/addProduct', 'CartController@addProduct')->name('api.addProduct');
    Route::get('/takeCartCount', 'CartController@takeCartCount')->name('api.takeCartCount');
    Route::post('/removeCart', 'CartController@removeCart')->name('api.removeCart');
    Route::post('/changeItemNumber', 'CartController@changeItemNumber')->name('api.changeItemNumber');
    //Rating
    Route::get('/rating', 'RatingController@rating')->name('api.rating');
    Route::post('/ratingv2', 'RatingController@ratingv2')->name('api.ratingv2');
    Route::get('/getRatingV2Data/{id}', 'RatingController@getRatingV2Data')->name('api.getRatingV2Data');

    //Comment
    Route::post('/getComment', 'CommentAPIController@getComment')->name('api.getComment');
    Route::post('/createComment', 'CommentAPIController@createComment')->name('api.createComment');
    //Product
    Route::post('/getProduct', 'ProductApiController@getProduct')->name('api.getProduct');
    Route::post('/product/quotePrice', 'ProductApiController@quotePrice')->name('api.quotePrice');
    //Received
    Route::post('/received', 'ReceivedApiController@received')->name('api.received');
});
