<x-app-layout>
    <div class="max-w-5xl mx-auto px-6 py-10">
        <h1 class="text-3xl font-extrabold text-pink-700 mb-8 text-center">
            📁 Daftar Kategori
        </h1>

        <!-- Tombol Tambah Kategori -->
        <div class="flex justify-end mb-6">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary text-sm md:text-base">
                ➕ Buat Kategori Baru
            </a>
        </div>

        @if ($kategoris->count() > 0)
            <div class="overflow-x-auto bg-white rounded-xl shadow-md">
                <table class="min-w-full divide-y divide-pink-200">
                    <thead class="bg-pink-100 text-pink-800 text-left text-sm font-semibold">
                        <tr>
                            <th class="px-6 py-3">#</th>
                            <th class="px-6 py-3">Nama Kategori</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm divide-y divide-pink-50">
                        @foreach ($kategoris as $index => $kategori)
                            <tr class="hover:bg-pink-50">
                                <td class="px-6 py-4">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-medium">{{ $kategori->name }}</td>
                                <td class="px-6 py-4 flex gap-3 items-center">
                                    <a href="{{ route('kategori.edit', $kategori->id) }}"
                                        class="text-blue-600 hover:underline font-semibold">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
                Belum ada kategori yang tersedia.
            </p>
        @endif
    </div>
</x-app-layout>