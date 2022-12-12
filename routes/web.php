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

Route::get('/pesan', function () {
    return view('pesan');
});
//image
Route::get('image/{filename}', 'HomeController@displayImage')->name('image.displayImage');

Route::get('/kategori', [KategoriController::class, "halaman"])->name("Admin.Kategori");
Route::post('/post-kategori', [KategoriController::class, "tambah"])->name("Admin.Post.Kategori");
Route::get('/tambah', [MinumanController::class, "halaman"])->name("Admin.Minuman");
Route::get('/', [MinumanController::class, "item"])->name("Minuman");
Route::get('/admin', [MinumanController::class, "item2"])->name("Admin");
Route::post('/post-minuman', [MinumanController::class, "tambah"])->name("Admin.Post.Minuman");
Route::get('/pesanan', function () {
    return view('admin.pesanan.index');
});
Route::get('/login', function () {
    return view('login');
});
//edit
Route::get('admin/minuman/edit', [MinumanController::class, "halaman2"])->name("Admin.Minuman.Edit");
Route::get('/admin/kategori/edit', function () {
    return view('admin.pesanan.kategoriEdit');
});