<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial; // 

class TestimonialController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Simpan testimoni ke database
        Testimonial::create([
            'user_id' => auth()->id(),
            'class_id' => $request->class_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
        ]);

        // Redirect balik dengan pesan sukses
        return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }
}