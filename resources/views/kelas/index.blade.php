<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-pink-600 text-center">
            🌸 Daftar Kelas untuk {{ $subcategory->name }}
        </h2>
    </x-slot>

    <div class="p-6 max-w-7xl mx-auto">
        @auth
            @if(auth()->user()->role === 'admin')
                <div class="mb-6 text-right">
                    <a href="{{ route('kelas.create', $subcategory->id) }}"
                        class="bg-pink-100 text-pink-700 text-sm px-4 py-1.5 rounded-full hover:bg-pink-200 transition shadow-sm">
                        ➕ Buat Kelas Baru
                    </a>
                </div>


            @endif
        @endauth

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($classes as $kelas)
                <div class="bg-white border border-pink-200 rounded-2xl pl-5 pr-5 pt-4 pb-4 flex flex-col justify-between transition duration-300"
                    style="box-shadow: 0 8px 16px rgba(244, 114, 182, 0.3);">
                    <div class="space-y-2">
                        <h3 class="text-xl font-bold text-gray-800">{{ $kelas->title }}</h3>
                        <p class="text-pink-600 font-semibold">Rp {{ number_format($kelas->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="flex justify-center gap-3 mt-6 flex-wrap">
                        <a href="{{ route('kelas.show', [$subcategory->id, $kelas->id]) }}"
                            class="bg-pink-100 text-pink-700 text-sm px-4 py-1.5 rounded-full hover:bg-pink-200 transition shadow-sm">
                            🔍 Lihat Detail
                        </a>

                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('kelas.edit', [$subcategory->id, $kelas->id]) }}"
                                    class="bg-pink-100 text-pink-700 text-sm px-4 py-1.5 rounded-full hover:bg-pink-200 transition shadow-sm">
                                    ✏️ Edit
                                </a>

                                <form action="{{ route('kelas.destroy', [$subcategory->id, $kelas->id]) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-pink-100 text-pink-700 text-sm px-4 py-1.5 rounded-full hover:bg-pink-200 transition shadow-sm">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500 italic col-span-3">Belum ada kelas untuk subkategori ini.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>