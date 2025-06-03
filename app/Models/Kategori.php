<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subkategori;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function subkategoris()
    {
        return $this->hasMany(Subkategori::class);
    }
}
