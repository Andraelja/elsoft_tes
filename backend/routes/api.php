<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ItemController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/signin', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::prefix('v1/item')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/', [ItemController::class, 'index']);
        Route::get('/{id}', [ItemController::class, 'find']);
        Route::post('/', [ItemController::class, 'store']);
        Route::put('/{id}', [ItemController::class, 'update']);
        Route::delete('/{id}', [ItemController::class, 'destroy']);
    });
});
