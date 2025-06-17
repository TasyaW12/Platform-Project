<!-- resources/views/kategori/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kategori
        </h2>
    </x-slot>

    <div class="mt-6">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div>
                <label for="name">Nama Kategori</label>
                <input type="text" name="name" id="name" value="{{ old('name', $kategori->name) }}" required>
            </div>

            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>