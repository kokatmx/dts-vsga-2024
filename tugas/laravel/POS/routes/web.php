<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LevelController;

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