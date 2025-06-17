<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Buat Subkategori Baru untuk Kategori: {{ $category->name }}</h1>

        <form action="{{ route('subkategori.store', $category->id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block font-medium">Nama Subkategori</label>
                <input type="text" name="name" id="name" required class="border p-2 w-full rounded">
            </div>
            <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>