<x-app-layout>
    <x-slot name="header">
        <h2>Edit Kelas: {{ $kelas->title }} (Subkategori: {{ $subcategory->name }})</h2>
    </x-slot>

    <div class="p-4">
        <form action="{{ route('kelas.update', [$subcategory->id, $kelas->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="title" class="block">Judul Kelas</label>
                <input type="text" name="title" id="title" class="w-full border"
                    value="{{ old('title', $kelas->title) }}" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block">Deskripsi Kelas</label>
                <textarea name="description" id="description" class="w-full border"
                    required>{{ old('description', $kelas->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="price" class="block">Harga</label>
                <input type="number" name="price" id="price" class="w-full border"
                    value="{{ old('price', $kelas->price) }}" required>
            </div>

            <div class="mb-4">
                <label for="max_participants" class="block">Max Partisipan</label>
                <input type="number" name="max_participants" id="max_participants" class="w-full border"
                    value="{{ old('max_participants', $kelas->max_participants) }}" required>
            </div>

            {{-- (Opsional) Tambahkan URL gambar --}}
            <div class="mb-4">
                <label for="image_url" class="block">URL Gambar</label>
                <input type="text" name="image_url" id="image_url" class="w-full border"
                    value="{{ old('image_url', $kelas->image_url) }}">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2">Perbarui Kelas</button>
        </form>
    </div>
</x-app-layout>