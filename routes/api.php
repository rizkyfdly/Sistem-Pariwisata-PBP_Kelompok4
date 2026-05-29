<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WisataApiController;
use App\Http\Controllers\API\KategoriApiController;
use App\Http\Controllers\API\UlasanApiController;

Route::get('/wisata', [WisataApiController::class, 'index']);
Route::get('/wisata/{id}', [WisataApiController::class, 'detail']);
Route::get('/kategori', [KategoriApiController::class, 'index']);

Route::get('/ulasan', [UlasanApiController::class, 'index']);

Route::get('/ulasan/{id}', [UlasanApiController::class, 'show']);

Route::post('/ulasan', [UlasanApiController::class, 'store']);

Route::put('/ulasan/{id}', [UlasanApiController::class, 'update']);

Route::delete('/ulasan/{id}', [UlasanApiController::class, 'destroy']);