<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Subkategori untuk Kategori: {{ $category->name }}</h1>

        <table class="min-w-full border">
            <thead class="bg-pink-200">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Nama Subkategori</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategories as $index => $sub)
                    <tr>
                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 border">{{ $sub->name }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('subkategori.edit', [$category->id, $sub->id]) }}"
                                class="text-blue-500 underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>