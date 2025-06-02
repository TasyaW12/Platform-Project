<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $fillable = [
        'user_id',
        'class_id',
        'rating',
        'comment',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function class()
    {
        return $this->belongsTo(Testimoni::class, 'class_id'); 
    }
}
