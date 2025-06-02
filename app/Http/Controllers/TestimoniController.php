<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function create($class_id)
    {
        return view('testimoni.create', compact('class_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classes,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        Testimoni::create([
            'user_id' => Auth::id(),
            'class_id' => $request->class_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('testimoni.list')->with('success', 'Terima kasih atas testimoni Anda!');
    }

    public function list()
    {
        $testimonis = Testimoni::where('user_id', Auth::id())->with('class')->get();
        return view('testimoni.list', compact('testimonis'));
    }
}
