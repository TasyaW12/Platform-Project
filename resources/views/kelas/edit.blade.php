<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-extrabold text-center text-pink-600">
            ✏️ Edit Kelas: {{ $kelas->title }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 p-8 bg-white shadow-lg rounded-xl border-l-4 border-pink-400 space-y-6">

        <form action="{{ route('kelas.update', [$subcategory->id, $kelas->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            {{-- Judul --}}
            <div>
                <label for="title">🎓 Judul Kelas</label>
                <input type="text" id="title" name="title" value="{{ old('title', $kelas->title) }}" required>
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description">📝 Deskripsi Kelas</label>
                <textarea id="description" name="description" rows="3" required>{{ old('description', $kelas->description) }}</textarea>
            </div>

            {{-- Harga --}}
            <div>
                <label for="price">💸 Harga</label>
                <input type="number" id="price" name="price" value="{{ old('price', $kelas->price) }}" required>
            </div>

            {{-- Max Partisipan --}}
            <div>
                <label for="max_participants">👥 Max Partisipan</label>
                <input type="number" id="max_participants" name="max_participants" value="{{ old('max_participants', $kelas->max_participants) }}" required>
            </div>

            {{-- URL Gambar --}}
            <div>
                <label for="image_url">🌆 URL Gambar</label>
                <input type="text" id="image_url" name="image_url" value="{{ old('image_url', $kelas->image_url) }}">
            </div>

            {{-- Tombol --}}
            <div class="text-right pt-4">
                <button type="submit" class="btn-pink">💾 Perbarui Kelas</button>
            </div>
        </form>
    </div>
</x-app-layout>
