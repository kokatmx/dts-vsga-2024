<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\HalloController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PageControllerSatu;
use App\Http\Controllers\PengajarController;

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
    return view('about');
})->name('tentang');

Route::get('tampil', function () {
    return view('tampil');
})->name('tampilan');

Route::get('/kodebarang/{jenis?}/{merek?}', function ($jk = 'k01', $mrk = 'nokia') {
    return '<h2>Kode barang : ' . $jk . ' dan nama merek : ' . $mrk . '</h2>';
});

Route::get('/posts/{post?}/{comment?}', function ($post = 1, $comment = "dua") {
    return '<h2>Post ke: ' . $post . '</h2>' . '<h2>Komentar ke: ' . $comment  . '</h2>';
});

Route::get('pesandisini', function () {
    return '<h1>Pesan disini</h1>';
});
Route::redirect('/contact-us', '/pesandisini');

Route::prefix('admin')->group(function () {
    Route::get('/dosen', function () {
        return '<h1>ini halaman dosen</h1>';
    });
    Route::get('/tendik', function () {
        return '<h1>ini halaman tendik</h1>';
    });
    Route::get('/jurusan', function () {
        return '<h1>ini halaman jurusan</h1>';
    });
});

Route::fallback(function () {
    return '<h1>404</h1>' . 'Halaman tidak ditemukan';
});

Route::get('/daftar-dosen', [PengajarController::class, 'daftarPengajar']);
Route::get('/tabel-dosen', [PengajarController::class, 'tabelPengajar']);
Route::get('/blog-dosen', [PengajarController::class, 'blogPengajar']);

Route::get('pasarBuah', [PageControllerSatu::class, 'satu']);

// Route::resource('/crud', [CRUDController::class, 'index']);

// Route::resource('/photos', [PhotoController::class])->only('index', 'show');
// Route::resource('/photos', [Pnpm install -D tailwindcss postcss autoprefixerhotoController::class])->except('create', 'store', 'update', 'destroy');

Route::get('selamat', function () {
    return view('hello', ['name' => 'dino']);
});

Route::get('/greeting', [WelcomeController::class, 'greeting']);

Route::get('helloow', [HalloController::class, 'greeting']);
