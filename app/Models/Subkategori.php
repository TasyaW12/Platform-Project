<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Subkategori extends Model
{
    protected $table = 'subkategoris';

    protected $fillable = [
        'nama',
        'kategori_id',
    ];

    // Relasi ke model Kategori (many-to-one)
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
