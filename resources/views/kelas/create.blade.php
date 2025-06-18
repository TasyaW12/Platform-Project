<x-app-layout>
    <x-slot name="header">
        <h2>Buat Kelas Baru untuk Subkategori: {{ $subcategory->name }}</h2>
    </x-slot>

    <div class="p-4">
        <form action="{{ route('kelas.store', $subcategory->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="title" class="block">Judul Kelas</label>
                <input type="text" name="title" id="title" class="w-full border" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block">Deskripsi Kelas</label>
                <textarea name="description" id="description" class="w-full border" required></textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block">Harga</label>
                <input type="number" name="price" id="price" class="w-full border" required>
            </div>

            <div class="mb-4">
                <label for="max_participants" class="block">Max Partisipan</label>
                <input type="number" name="max_participants" id="max_participants" class="w-full border" required>
            </div>

            {{-- (Opsional) Tambahkan input gambar --}}
            <div class="mb-4">
                <label for="image_url" class="block">URL Gambar</label>
                <input type="text" name="image_url" id="image_url" class="w-full border">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Simpan Kelas</button>
        </form>
    </div>
</x-app-layout>