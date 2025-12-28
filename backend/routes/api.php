<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\TransactionController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/signin', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::prefix('/v1')->middleware('auth:sanctum')->group(function () {

    Route::prefix('item')->group(function () {
        Route::get('/list', [ItemController::class, 'index']);
        Route::get('/{Oid}', [ItemController::class, 'find']);
        Route::post('/', [ItemController::class, 'store']);
        Route::put('/{Oid}', [ItemController::class, 'update']);
        Route::delete('/{Oid}', [ItemController::class, 'destroy']);
        Route::post('/save', [ItemController::class, 'save']);
    });

    Route::prefix('stockissue')->group(function () {
        Route::get('/list', [TransactionController::class, 'index']);
        Route::get('/{Oid}', [TransactionController::class, 'find']);
        Route::post('/', [TransactionController::class, 'store']);
        Route::put('/{Oid}', [TransactionController::class, 'update']);
        Route::delete('/{Oid}', [TransactionController::class, 'destroy']);
        Route::post('/save', [TransactionController::class, 'save']);
    });
});
