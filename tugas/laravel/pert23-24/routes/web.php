<?php

use App\Http\Controllers\CategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::prefix('level')->group(function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::prefix('categori')->group(function () {
    Route::get('/', [CategoriController::class, 'index']);
    Route::post('/list', [CategoriController::class, 'list']);
    Route::get('/create', [CategoriController::class, 'create']);
    Route::post('/', [CategoriController::class, 'store']);
    Route::get('/{id}', [CategoriController::class, 'show']);
    Route::get('/{id}/edit', [CategoriController::class, 'edit']);
    Route::put('/{id}', [CategoriController::class, 'update']);
    Route::delete('/{id}', [CategoriController::class, 'destroy']);
});
