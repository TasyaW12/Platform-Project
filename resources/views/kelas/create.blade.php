<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-center text-pink-600">
            ➕ Buat Kelas Baru untuk {{ $subcategory->name }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-xl border-l-4 border-pink-400 space-y-6">
        <form action="{{ route('subkategori.kelas.store', $subcategory->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf

            {{-- Judul Kelas --}}
            <div>
                <label for="title">🎓 Judul Kelas</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            {{-- Deskripsi Kelas --}}
            <div>
                <label for="description">📝 Deskripsi Kelas</label>
                <textarea id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
            </div>

            {{-- Harga --}}
            <div>
                <label for="price">💸 Harga</label>
                <input type="number" id="price" name="price" value="{{ old('price') }}" required>
            </div>

            {{-- Max Partisipan --}}
            <div>
                <label for="max_participants">👥 Max Partisipan</label>
                <input type="number" id="max_participants" name="max_participants" value="{{ old('max_participants') }}"
                    required>
            </div>

            {{-- URL Gambar --}}
            <div>
                <label for="image_url">🌆 URL Gambar</label>
                <input type="text" id="image_url" name="image_url" value="{{ old('image_url') }}"
                    placeholder="https://example.com/gambar.jpg">
            </div>

            {{-- Tombol Simpan --}}
            <div class="text-right pt-4">
                <button type="submit" class="btn-pink">💾 Simpan Kelas</button>
            </div>
        </form>
    </div>
</x-app-layout>