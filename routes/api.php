<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Api\V1\Modules'], function() {
    Route::apiResource('categories', \Categories\Controllers\CategoryController::class);
    Route::apiResource('products', \Products\Controllers\ProductController::class);
});
