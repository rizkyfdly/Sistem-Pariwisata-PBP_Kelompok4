<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TempatWisata;
use App\Models\Galeri;
use App\Models\Ulasan;

class WisataApiController extends Controller
{
    // API Semua Wisata
    public function index()
    {
        $wisata = TempatWisata::with('kategori')
                    ->latest()
                    ->get();

        return response()->json([

            'success' => true,
            'message' => 'Data wisata berhasil diambil',
            'data' => $wisata

        ]);
    }

    public function detail($id)
    {
        $wisata = TempatWisata::with([
                        'kategori',
                        'galeri',
                        'ulasan.user'
                    ])->find($id);

        // Jika data tidak ditemukan
        if (!$wisata) {

            return response()->json([

                'success' => false,
                'message' => 'Data wisata tidak ditemukan'

            ], 404);
        }

        return response()->json([

            'success' => true,
            'message' => 'Detail wisata berhasil diambil',
            'data' => $wisata

        ]);
    }

    
}