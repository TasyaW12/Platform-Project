<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    /**
     * Kolom-kolom yang boleh diisi secara massal (mass assignment)
     */
    protected $fillable = [
        'kelas_id',     // foreign key ke tabel kelas
        'date',         // tanggal jadwal
        'start_time',   // (opsional) jam mulai
        'end_time',     // (opsional) jam selesai
        'instructor_name',
    ];

    /**
     * Relasi: Schedule milik satu kelas
     */
    public function kelas()
    {
        return $this->belongsTo(\App\Models\Kelas::class, 'kelas_id');
    }

    /**
     * Relasi: Schedule bisa memiliki banyak booking (jika ada tabel bookings)
     * Jika belum ada model Booking, Anda bisa hapus method ini
     */
    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class); // pastikan model Booking ada
    }
}