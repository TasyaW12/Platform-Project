<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Kategori</h1>

        <!-- Tombol Tambah Kategori -->
        <a href="{{ route('kategori.create') }}"
            class="inline-block bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600 mb-4">
            + Buat Kategori Baru
        </a>

        @if($kategoris->count() > 0)
            <table class="min-w-full border bg-white shadow rounded">
                <thead class="bg-blue-200 text-gray-800">
                    <tr>
                        <th class="px-4 py-2 border text-left">#</th>
                        <th class="px-4 py-2 border text-left">Nama Kategori</th>
                        <th class="px-4 py-2 border text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kategoris as $index => $kategori)
                        <tr class="hover:bg-blue-50">
                            <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border">{{ $kategori->name }}</td>
                            <td class="px-4 py-2 border">
                                <a href="{{ route('kategori.edit', $kategori->id) }}"
                                    class="text-yellow-500 hover:underline">Edit</a>
                                <span class="text-gray-400 mx-1">|</span>
                                <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST"
                                    style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
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
            <p class="text-gray-600 mt-4">Belum ada kategori yang tersedia.</p>
        @endif
    </div>
</x-app-layout>