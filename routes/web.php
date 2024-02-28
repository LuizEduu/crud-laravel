<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;

Route::post('/users', [UserController::class, 'save']);
Route::get('/users/{id}', [UserController::class, 'findById']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'delete']);
Route::get('/session', function (Request $request) {
    $token = $request->session()->token();

    $token = csrf_token();

    return response()->json([
        'token' => $token
    ]);
});
