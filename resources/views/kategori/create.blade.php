<!-- resources/views/kategori/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2>Buat Kategori Baru</h2>
    </x-slot>

    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nama Kategori</label>
            <input type="text" name="name" id="name" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</x-app-layout>