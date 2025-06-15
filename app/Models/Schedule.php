<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public function class()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function bookings()
    {
        return $this->hasMany(Kelas::class);
    }
}
