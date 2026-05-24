<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\SoapController;
use Illuminate\Support\Facades\Route;

Route::get('/soap/wisata', [SoapController::class, 'wisata']);

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
});


Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->middleware('admin');

Route::get('/admin/kategori', [AdminController::class, 'kategori']);

Route::get('/admin/kategori/tambah', [AdminController::class, 'tambahKategori']);

Route::post('/admin/kategori/simpan', [AdminController::class, 'simpanKategori']);

Route::get('/admin/kategori/edit/{id}', [AdminController::class, 'editKategori']);

Route::post('/admin/kategori/update/{id}', [AdminController::class, 'updateKategori']);

Route::get('/admin/kategori/hapus/{id}', [AdminController::class, 'hapusKategori']);


Route::get('/admin/wisata', [AdminController::class, 'wisata']);

Route::get('/admin/wisata/tambah', [AdminController::class, 'tambahWisata']);

Route::post('/admin/wisata/simpan', [AdminController::class, 'simpanWisata']);

Route::get('/admin/wisata/edit/{id}', [AdminController::class, 'editWisata']);

Route::post('/admin/wisata/update/{id}', [AdminController::class, 'updateWisata']);

Route::get('/admin/wisata/hapus/{id}', [AdminController::class, 'hapusWisata']);

Route::get('/admin/galeri', [AdminController::class, 'galeri']);

Route::get('/admin/galeri/tambah', [AdminController::class, 'tambahGaleri']);

Route::post('/admin/galeri/simpan', [AdminController::class, 'simpanGaleri']);

Route::get('/admin/galeri/hapus/{id}', [AdminController::class, 'hapusGaleri']);

Route::get('/admin/galeri/edit/{id}', [AdminController::class, 'editGaleri']);

Route::post('/admin/galeri/update/{id}', [AdminController::class, 'updateGaleri']);

Route::get('/admin/ulasan', [AdminController::class, 'ulasan']);

Route::get('/admin/ulasan/hapus/{id}', [AdminController::class, 'hapusUlasan']);

Route::get('/admin/user', [AdminController::class, 'user']);

Route::get('/admin/user/tambah', [AdminController::class, 'tambahUser']);

Route::post('/admin/user/simpan', [AdminController::class, 'simpanUser']);

Route::get('/admin/user/edit/{id}', [AdminController::class, 'editUser']);

Route::post('/admin/user/update/{id}', [AdminController::class, 'updateUser']);

Route::get('/admin/user/hapus/{id}', [AdminController::class, 'hapusUser']);
Route::get('/admin/wisata', [AdminController::class, 'wisata']);
Route::get('/admin/wisata/tambah', [AdminController::class, 'tambahWisata']);
Route::post('/admin/wisata/simpan', [AdminController::class, 'simpanWisata']);

Route::get('/admin', [AdminController::class, 'dashboard']);
Route::get('/home', [WisataController::class, 'index']);


Route::get('/home', function () {
    return view('user.home');
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register-proses', [AuthController::class, 'registerProses']);

Route::get('/profil', [AuthController::class, 'profil']);
Route::get('/profil/edit', [AuthController::class, 'editProfil']);
Route::post('/profil/update', [AuthController::class, 'updateProfil']);

Route::get('/admin/profil', [AuthController::class, 'profil']);

Route::post('/admin/profil/update', [AuthController::class, 'updateProfil']);


Route::get('/home', [WisataController::class, 'index']);

Route::get('/wisata/{id}', [WisataController::class, 'detail']);

Route::post('/ulasan/simpan', [WisataController::class, 'simpanUlasan']);