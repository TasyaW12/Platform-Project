<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // Pastikan pakai 'name', bukan 'nama'

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
