<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Kelas;  // Mengganti 'Class' menjadi 'Kelas'
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan daftar kelas berdasarkan subkategori
    public function index($subcategory_id)
    {
        $subcategory = Subcategory::findOrFail($subcategory_id);
        $classes = $subcategory->classes;  // Ambil kelas yang terhubung dengan subkategori
        return view('kelas.index', compact('classes', 'subcategory'));
    }

    // Menampilkan form untuk membuat kelas baru
    public function create($subcategory_id)
    {
        $subcategory = Subcategory::findOrFail($subcategory_id);
        return view('kelas.create', compact('subcategory'));
    }

    // Menyimpan kelas baru
    public function store(Request $request, $subcategory_id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'max_participants' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('kelas_images', 'public');
            $validated['image_url'] = $imagePath;
        }

        $validated['subcategory_id'] = $subcategory_id;

        Kelas::create($validated);

        return redirect()->route('subkategori.kelas.index', $subcategory_id);
    }

    // Menampilkan detail kelas (untuk user & admin)
    public function show($subcategory_id, $id)
    {
        $subcategory = Subcategory::findOrFail($subcategory_id);
        $kelas = Kelas::with('schedules')->findOrFail($id);
        return view('kelas.show', compact('kelas', 'subcategory'));
    }

    // Menampilkan form untuk mengedit kelas
    public function edit($subcategory_id, $id)
    {
        $subcategory = Subcategory::findOrFail($subcategory_id);
        $kelas = Kelas::findOrFail($id);  // Mengganti 'Class' menjadi 'Kelas'
        return view('kelas.edit', compact('kelas', 'subcategory'));  // Pastikan 'class' diganti menjadi 'kelas'
    }

    // Memperbarui kelas
    public function update(Request $request, $subcategory_id, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'max_participants' => 'required|integer',
        ]);

        $kelas = Kelas::findOrFail($id);  // Mengganti 'Class' menjadi 'Kelas'
        $kelas->update($request->all());

        return redirect()->route('kelas.index', $subcategory_id)->with('success', 'Kelas berhasil diperbarui.');
    }

    // Menghapus kelas
    public function destroy($subcategory_id, $id)
    {
        $kelas = Kelas::findOrFail($id);  // Mengganti 'Class' menjadi 'Kelas'
        $kelas->delete();

        return redirect()->route('kelas.index', $subcategory_id)->with('success', 'Kelas berhasil dihapus.');
    }
}
