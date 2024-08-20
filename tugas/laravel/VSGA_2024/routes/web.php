<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profil/data', [UserController::class, 'getUsers'])->name('profil.data');
    Route::get('/profil', [UserController::class, 'index']);
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('/galeri', function () {
        return view('galeri');
    })->name('galeri');
    Route::get('/kontak', function () {
        return view('kontak');
    })->name('kontak');
});

require __DIR__ . '/auth.php';

// todo:punya ku

Route::get('/home', function () {
    return view('home');
})->name('home');
Route::get('/galeri', function () {
    return view('galeri');
});
Route::get('/kontak', function () {
    return view('kontak');
});
