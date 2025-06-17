<!-- resources/views/kategori/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Kategori
        </h2>
    </x-slot>

    <div class="mt-6">
        <a href="{{ route('kategori.create') }}" class="text-blue-500">Buat Kategori Baru</a>
        <ul class="mt-4">
            @foreach($kategoris as $kategori)
                <li class="flex justify-between items-center">
                    <span>{{ $kategori->nama }}</span>
                    <div class="space-x-2">
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="text-yellow-500">Edit</a>
                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>