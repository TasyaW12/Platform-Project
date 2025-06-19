<!-- resources/views/subkategori/index.blade.php -->
<x-app-layout>
    <div class="max-w-5xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-extrabold text-pink-700 mb-8 text-center">
            📂 Subkategori untuk Kategori: {{ $category->name }}
        </h1>

        <!-- Tombol Tambah Subkategori -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('subkategori.create', $category->id) }}" class="btn btn-primary text-sm md:text-base">
                ➕ Tambah Subkategori
            </a>
        </div>

        @if ($subcategories->count() > 0)
            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="min-w-full divide-y divide-pink-200">
                    <thead class="bg-pink-100 text-pink-800 text-left text-sm font-semibold">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Nama Subkategori</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm divide-y divide-pink-50">
                        @foreach ($subcategories as $index => $sub)
                            <tr class="hover:bg-pink-50">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-medium">{{ $sub->name }}</td>
                                <td class="px-6 py-4 flex gap-3 items-center">
                                    <a href="{{ route('subkategori.edit', [$category->id, $sub->id]) }}"
                                        class="text-blue-600 hover:underline font-semibold">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('subkategori.destroy', [$category->id, $sub->id]) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus subkategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline font-semibold">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-500 mt-6 text-center italic">
                Belum ada subkategori untuk kategori ini.
            </p>
        @endif
    </div>
</x-app-layout>