<?php

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
    return 'selamat datang';
});

Route::get('/hello', function () {
    return '<h1>hello VSGA</h1>';
});
Route::get('/world', function () {
    return '<h1>hello world</h1>';
});
Route::get('/about', function () {
    return '<h1>NIM: 2231740034</h1>';
});
Route::get('/user/{name}', function ($name) {
    return '<h2>Hello, nama saya adalah ' . $name . '</h2>';
});
