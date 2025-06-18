<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $fillable = [
        'subcategory_id',
        'title',
        'description',
        'image_url',
        'price',
        'max_participants',
    ];

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function schedules()
    {
        return $this->hasMany(\App\Models\Schedule::class, 'class_id');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
