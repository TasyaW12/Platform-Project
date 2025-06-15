<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
class KategoriController extends Controller
{ 
 // Menampilkan daftar kategori
    public function index()
    {
        $kategoris = Category::all();
        return view('kategori.index', compact('kategoris'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dibuat.');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id)
    {
        $kategori = Category::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // Memperbarui kategori
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $kategori = Category::findOrFail($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $kategori = Category::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}