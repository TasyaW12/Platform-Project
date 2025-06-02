<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'class_id',
        'date',
        'start_time',
        'end_time',
        'instructor_name',
    ];
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function class()
    {
        return $this->belongsTo(Schedule::class, 'class_id'); 
    }
}
