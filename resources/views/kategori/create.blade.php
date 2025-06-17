<!-- resources/views/kategori/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2>Buat Kategori Baru</h2>
    </x-slot>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div>
            <label for="nama">Nama Kategori</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</x-app-layout>