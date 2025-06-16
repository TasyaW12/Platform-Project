<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
