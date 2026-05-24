<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasan';

    protected $fillable = [
        'user_id',
        'tempat_wisata_id',
        'komentar',
        'rating'
    ];

    // Relasi user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi wisata
    public function wisata()
    {
        return $this->belongsTo(
            TempatWisata::class,
            'tempat_wisata_id'
        );
    }
}