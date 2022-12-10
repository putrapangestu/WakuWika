<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{KategoriController,MinumanController};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/pesan', function () {
    return view('pesan');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/kategori', [KategoriController::class, "halaman"])->name("Admin.Kategori");
Route::post('/post-kategori', [KategoriController::class, "tambah"])->name("Admin.Post.Kategori");
Route::get('/tambah', [MinumanController::class, "halaman"])->name("Admin.Minuman");
Route::post('/post-minuman', [MinumanController::class, "tambah"])->name("Admin.Post.Minuman");
Route::get('/pesanan', function () {
    return view('admin.pesanan.index');
});
Route::get('/login', function () {
    return view('login');
});