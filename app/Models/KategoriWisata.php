<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'nama_kategori',
    'deskripsi'
])]

class KategoriWisata extends Model
{
    protected $table = 'kategori_wisata';

    public function tempatWisata()
    {
        return $this->hasMany(TempatWisata::class, 'kategori_id');
    }
}