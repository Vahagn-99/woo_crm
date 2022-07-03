<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

Route::controller(ApiController::class)->group(function () {
    Route::get('/products', 'products');
    Route::get('/order-products', 'OrderProducts');
    Route::get('/query/{status?}/{has?}', 'orderByLineItemId');
});
