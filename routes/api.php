<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WisataApiController;
use App\Http\Controllers\API\KategoriApiController;

Route::get('/wisata', [WisataApiController::class, 'index']);
Route::get('/wisata/{id}', [WisataApiController::class, 'detail']);
Route::get('/kategori', [KategoriApiController::class, 'index']);