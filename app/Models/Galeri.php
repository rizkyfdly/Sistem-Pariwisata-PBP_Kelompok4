<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TempatWisata;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $fillable = [

        'tempat_wisata_id',
        'foto',
        'keterangan'

    ];

    // RELASI
    public function wisata()
    {
        return $this->belongsTo(
            TempatWisata::class,
            'tempat_wisata_id',
            'id'
        );
    }
}