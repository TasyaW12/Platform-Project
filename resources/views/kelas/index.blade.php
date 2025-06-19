<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Daftar Kelas untuk Subkategori: {{ $subcategory->name }}</h2>
    </x-slot>

    <div class="p-6">
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('kelas.create', $subcategory->id) }}"
                    class="inline-block mb-6 bg-yellow-400 text-black px-5 py-2 rounded-md font-semibold shadow hover:bg-yellow-500 transition">
                    + Buat Kelas Baru
                </a>
            @endif
        @endauth

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($classes as $kelas)
                <div class="bg-white shadow-md rounded-2xl p-4 border border-gray-200 flex flex-col justify-between h-64">
                    <div>
                        <h3 class="text-lg font-bold mb-2">{{ $kelas->title }}</h3>
                        <p class="text-gray-600 mb-4">Rp {{ number_format($kelas->price, 0, ',', '.') }}</p>
                    </div>

                    {{-- Tombol sejajar horizontal --}}
                    <div class="flex justify-center items-center gap-4 mt-auto">
                        <a href="{{ route('kelas.show', [$subcategory->id, $kelas->id]) }}"
                            class="text-sm text-indigo-600 font-medium hover:underline">
                            Lihat
                        </a>


                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('kelas.edit', [$subcategory->id, $kelas->id]) }}"
                                    class="text-sm text-green-600 font-medium hover:underline">
                                    Edit
                                </a>


                                <form action="{{ route('kelas.destroy', [$subcategory->id, $kelas->id]) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus kelas ini?')" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-sm text-red-600 font-medium hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>


            @endforeach
        </div>
    </div>
</x-app-layout>