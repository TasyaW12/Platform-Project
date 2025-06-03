<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subkategori;
use App\Models\Kategori;

class SubkategoriController extends Controller
{
    public function index()
    {
        $subkategoris = Subkategori::with('kategori')->get();
        return view('admin.subkategori.index', compact('subkategoris'));
    }

    public function create()
    {
        $kategoris = Kategori::all(); // untuk dropdown kategori
        return view('admin.subkategori.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);

        Subkategori::create($request->all());

        return redirect()->route('subkategori.index')->with('success', 'Subkategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $subkategori = Subkategori::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.subkategori.edit', compact('subkategori', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id'
        ]);

        $subkategori = Subkategori::findOrFail($id);
        $subkategori->update($request->all());

        return redirect()->route('subkategori.index')->with('success', 'Subkategori berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $subkategori = Subkategori::findOrFail($id);
        $subkategori->delete();

        return redirect()->route('subkategori.index')->with('success', 'Subkategori berhasil dihapus!');
    }
}
