<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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
    return view('home', ["title" => "Home"]);
});
Route::get('/galeri', function () {
    return view('galeri', ["title" => "Galeri"]);
});
// Route::get('/profil', function () {
//     return view('profil', [UserController::class, 'index'], ["title" => "Profil"]);
// });
Route::get('/kontak', function () {
    return view('kontak', ["title" => "Kontak"]);
});


Route::get('profil', [UserController::class, 'index']);
Route::get('profil/data', [UserController::class, 'getUsers'])->name('profil.data');
