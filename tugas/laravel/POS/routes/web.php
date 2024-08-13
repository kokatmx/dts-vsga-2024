<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level', [LevelController::class, 'index']);
Route::get('/update', [LevelController::class, 'update']);
Route::get('/display', [LevelController::class, 'display']);
Route::get('/delete', [LevelController::class, 'delete']);

Route::get('/kat_insert', [KategoriController::class, 'store']);
Route::get('/kat_update', [KategoriController::class, 'update']);
Route::get('/kat_delete', [KategoriController::class, 'delete']);
Route::get('/kat_show', [KategoriController::class, 'show']);

Route::get('/user_insert', [UserController::class, 'store']);
Route::get('/user_update', [UserController::class, 'update']);
Route::get('/user_delete', [UserController::class, 'delete']);
Route::get('/user', [UserController::class, 'index']);

Route::get('/cekobject', [AnggotaController::class, 'cekObject']);
Route::get('/insert', [AnggotaController::class, 'insert']);
Route::get('/update', [AnggotaController::class, 'update']);
Route::get('/delete', [AnggotaController::class, 'delete']);
Route::get('/all', [AnggotaController::class, 'all']);
Route::get('/find', [AnggotaController::class, 'find']);
Route::get('/getWhere', [AnggotaController::class, 'getWhere']);
