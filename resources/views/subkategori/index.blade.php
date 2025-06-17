<!-- resources/views/subkategori/index.blade.php -->
<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">
            Daftar Subkategori untuk Kategori: {{ $category->name }}
        </h1>

        <!-- Tombol Tambah Subkategori -->
        <a href="{{ route('subkategori.create', $category->id) }}"
           class="inline-block bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 mb-4">
           + Tambah Subkategori
        </a>

        @if ($subcategories->count() > 0)
            <table class="min-w-full border bg-white shadow rounded">
                <thead class="bg-pink-200 text-gray-800">
                    <tr>
                        <th class="px-4 py-2 border text-left">#</th>
                        <th class="px-4 py-2 border text-left">Nama Subkategori</th>
                        <th class="px-4 py-2 border text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subcategories as $index => $sub)
                        <tr class="hover:bg-pink-50">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $sub->name }}</td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('subkategori.edit', [$category->id, $sub->id]) }}"
                                   class="text-blue-500 hover:underline">Edit</a>
                                <span class="text-gray-400 mx-1">|</span>
                                <form action="{{ route('subkategori.destroy', [$category->id, $sub->id]) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Yakin ingin menghapus subkategori ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-600 mt-4">Belum ada subkategori untuk kategori ini.</p>
        @endif
    </div>
</x-app-layout>
