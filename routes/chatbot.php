


<?php

use App\Http\Controllers\Front\ChatBotController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ChatBot APIs
|--------------------------------------------------------------------------
*/

Route::prefix('api/chatbot')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Products
    |--------------------------------------------------------------------------
    */
    Route::get(
        '/search',
        [ChatBotController::class, 'productSearch']
    )->name('chatbot.search');

    Route::get(
        '/product',
        [ChatBotController::class, 'getProduct']
    )->name('chatbot.product');

    Route::get(
        '/related-products',
        [ChatBotController::class, 'relatedProducts']
    )->name('chatbot.related_products');

    /*
    |--------------------------------------------------------------------------
    | Orders
    |--------------------------------------------------------------------------
    */
    Route::post(
        '/add-to-cart',
        [ChatBotController::class, 'addToCart']
    )->name('chatbot.add_to_cart');
    Route::post(
        '/place-order',
        [ChatBotController::class, 'placeOrder']
    )->name('chatbot.place_order');

    Route::get(
        '/track-order',
        [ChatBotController::class, 'trackOrder']
    )->name('chatbot.track_order');

});
