<x-app-layout>
    <x-slot name="header">
        <h2>Daftar Kelas untuk Subkategori: {{ $subcategory->name }}</h2>
    </x-slot>

    <div class="p-4">
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('kelas.create', $subcategory->id) }}" class="btn btn-primary mb-3">Buat Kelas Baru</a>
            @endif
        @endauth
        <ul class="list-disc pl-5 space-y-2">
            @foreach($classes as $kelas)
                <li>
                    <strong>{{ $kelas->title }}</strong> - Rp {{ number_format($kelas->price, 0, ',', '.') }}
                    <div class="mt-1">
                        <a href="{{ route('kelas.show', [$subcategory->id, $kelas->id]) }}" class="text-blue-500">Lihat</a>

                        @auth
                            @if(auth()->user()->role === 'admin')
                                | <a href="{{ route('kelas.edit', [$subcategory->id, $kelas->id]) }}"
                                    class="text-green-500">Edit</a>
                                |
                                <form action="{{ route('kelas.destroy', [$subcategory->id, $kelas->id]) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Hapus</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>