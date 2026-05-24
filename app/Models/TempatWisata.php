<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'kategori_id',
    'nama_tempat',
    'lokasi',
    'deskripsi',
    'harga_tiket',
    'jam_buka',
    'gambar',
    'latitude',
    'longitude',
    'rating'
])]

class TempatWisata extends Model
{
    protected $table = 'tempat_wisata';

    public function kategori()
    {
        return $this->belongsTo(KategoriWisata::class, 'kategori_id');
    }

    public function galeri()
    {
        return $this->hasMany(Galeri::class);
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'tempat_wisata_id');
    }
}