<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\KategoriWisata;

class KategoriApiController extends Controller
{
    // API Semua Kategori
    public function index()
    {
        $kategori = KategoriWisata::latest()->get();

        return response()->json([

            'success' => true,
            'message' => 'Data kategori berhasil diambil',
            'data' => $kategori

        ]);
    }
}