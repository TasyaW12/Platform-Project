<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'harga', 'gambar', 'subkategori_id'];

    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class);
    }
}
