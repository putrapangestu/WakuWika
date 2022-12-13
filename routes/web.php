<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{KategoriController,MinumanController};
use App\Http\Controllers\{LoginController};
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

//login
Route::get('/login', [LoginController::class, "halaman"]);
Route::post('/post-login', [LoginController::class, "postLogin"])->name("Admin.login");

Route::get('/pesan', function () {
    return view('pesan');
});

//image
Route::get('image/{filename}', 'HomeController@displayImage')->name('image.displayImage');

Route::get('/admin', [MinumanController::class, "item2"])->name("Admin");

//tambah data
Route::get('/kategori', [KategoriController::class, "halaman"])->name("Admin.Kategori");
Route::post('/post-kategori', [KategoriController::class, "tambah"])->name("Admin.Post.Kategori");
Route::get('/tambah', [MinumanController::class, "halaman"])->name("Admin.Minuman");
Route::get('/', [MinumanController::class, "item"])->name("Minuman");
Route::post('/post-minuman', [MinumanController::class, "tambah"])->name("Admin.Post.Minuman");
Route::get('/pesanan', function () {
    return view('admin.pesanan.index');
});

//edit
Route::get('admin/minuman/edit/{id}', [MinumanController::class, "halaman2"])->name("Admin.Minuman.Edit");
Route::post('/admin/minuman/{id}/edit', [MinumanController::class, "edit"])->name("Admin.Minuman.Edit.Post");
Route::get('/admin/minuman/{id}/hapus', [MinumanController::class, "hapus"])->name("Admin.Minuman.Delete");

Route::get('/admin/kategori/edit/{id}', [KategoriController::class, "showItem"])->name("Admin.Kategori.Edit");
Route::post('/admin/kategori/{id}/edit', [KategoriController::class, "edit"])->name("Admin.Kategori.Edit.Post");
Route::get('/admin/kategori/{id}/hapus', [KategoriController::class, "hapus"])->name("Admin.Kategori.Delete");