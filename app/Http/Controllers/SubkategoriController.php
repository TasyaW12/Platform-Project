<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubkategoriController extends Controller
{
   // Menampilkan daftar subkategori berdasarkan kategori
    public function index($category_id)
    {
        $category = Category::findOrFail($category_id);
        $subcategories = $category->subcategories;
        return view('subkategori.index', compact('subcategories', 'category'));
    }

    // Menampilkan form untuk membuat subkategori baru
    public function create($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('subkategori.create', compact('category'));
    }

    // Menyimpan subkategori baru
    public function store(Request $request, $category_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($category_id);
        $category->subcategories()->create($request->all());

        return redirect()->route('subkategori.index', $category_id)->with('success', 'Subkategori berhasil dibuat.');
    }

    // Menampilkan form untuk mengedit subkategori
    public function edit($category_id, $id)
    {
        $category = Category::findOrFail($category_id);
        $subcategory = Subcategory::findOrFail($id);
        return view('subkategori.edit', compact('subcategory', 'category'));
    }

    // Memperbarui subkategori
    public function update(Request $request, $category_id, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subcategory = Subcategory::findOrFail($id);
        $subcategory->update($request->all());

        return redirect()->route('subkategori.index', $category_id)->with('success', 'Subkategori berhasil diperbarui.');
    }

    // Menghapus subkategori
    public function destroy($category_id, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('subkategori.index', $category_id)->with('success', 'Subkategori berhasil dihapus.');
    }
}