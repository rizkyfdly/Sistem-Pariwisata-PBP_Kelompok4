<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Ulasan;

class UlasanApiController extends Controller
{
    // GET ALL ULASAN
    public function index()
    {
        $ulasan = Ulasan::with('user', 'wisata')->get();

        return response()->json($ulasan);
    }

    // GET DETAIL ULASAN
    public function show($id)
    {
        $ulasan = Ulasan::with('user', 'wisata')->find($id);

        if(!$ulasan){

            return response()->json([
                'message' => 'Ulasan tidak ditemukan'
            ], 404);

        }

        return response()->json($ulasan);
    }

    // TAMBAH ULASAN
    public function store(Request $request)
    {
        $ulasan = Ulasan::create([

            'user_id' => $request->user_id,
            'tempat_wisata_id' => $request->tempat_wisata_id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,

        ]);

        return response()->json([
            'message' => 'Ulasan berhasil ditambahkan',
            'data' => $ulasan
        ]);
    }

    // UPDATE ULASAN
    public function update(Request $request, $id)
    {
        $ulasan = Ulasan::find($id);

        if(!$ulasan){

            return response()->json([
                'message' => 'Ulasan tidak ditemukan'
            ], 404);

        }

        $ulasan->update([

            'rating' => $request->rating,
            'komentar' => $request->komentar,

        ]);

        return response()->json([
            'message' => 'Ulasan berhasil diupdate',
            'data' => $ulasan
        ]);
    }

    // HAPUS ULASAN
    public function destroy($id)
    {
        $ulasan = Ulasan::find($id);

        if(!$ulasan){

            return response()->json([
                'message' => 'Ulasan tidak ditemukan'
            ], 404);

        }

        $ulasan->delete();

        return response()->json([
            'message' => 'Ulasan berhasil dihapus'
        ]);
    }
}