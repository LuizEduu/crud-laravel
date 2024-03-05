<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group([
    'middleware' => 'custom.auth',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login'])->withoutMiddleware("custom.auth");
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});

Route::post('/users', [UserController::class, 'save']);
Route::get('/users/{id}', [UserController::class, 'findById']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);

Route::post('/products', [ProductsController::class, 'create']);
Route::get('/products/{id}', [ProductsController::class, 'findById']);

Route::post('/orders/product/{product_id}/user/{user_id}', [OrderController::class, 'save']);
Route::get('/orders/user/{user_id}', [OrderController::class, 'findByUserId']);
