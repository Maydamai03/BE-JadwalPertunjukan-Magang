<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PertunjukanController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [UserController::class, 'index']);
        Route::delete('/users/{id}', [UserController::class, 'destroy']);

        Route::post('/pertunjukan', [PertunjukanController::class, 'store']);
        Route::put('/pertunjukan/{id}', [PertunjukanController::class, 'update']);
        Route::delete('/pertunjukan/{id}', [PertunjukanController::class, 'destroy']);
    });

    Route::get('/jadwal', [PertunjukanController::class, 'index']);
});

