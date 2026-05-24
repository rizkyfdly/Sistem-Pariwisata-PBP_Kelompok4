<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatWisata;
use App\Models\Ulasan;

class WisataController extends Controller
{
    // Dashboard User
    public function index()
    {
        $wisata = TempatWisata::all();

        return view('user.home', compact('wisata'));
    }

    // Detail Wisata
    public function detail($id)
    {
        $wisata = TempatWisata::findOrFail($id);

        $ulasan = Ulasan::where('tempat_wisata_id', $id)
                    ->latest()
                    ->get();

        return view('user.detail-wisata', compact('wisata', 'ulasan'));
    }

    // Simpan Ulasan
    public function simpanUlasan(Request $request)
    {
        Ulasan::create([
            'user_id' => auth()->user()->id,
            'tempat_wisata_id' => $request->tempat_wisata_id,
            'komentar' => $request->komentar,
            'rating' => $request->rating,
        ]);

        return back();
    }
}