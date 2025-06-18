<x-app-layout>
    <x-slot name="header">
        <h2>Detail Kelas: {{ $kelas->title }}</h2>
    </x-slot>

    <div class="p-4 space-y-4">

        {{-- Gambar Kelas --}}
        @if($kelas->image_url)
            <div class="mb-4">
                <img src="{{ asset('storage/' . $kelas->image_url) }}" alt="{{ $kelas->title }}"
                    class="w-full max-w-md rounded">
            </div>
        @endif

        {{-- Informasi Utama --}}
        <div>
            <p><strong>Subkategori:</strong> {{ $subcategory->name }}</p>
            <p><strong>Deskripsi:</strong> {{ $kelas->description }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($kelas->price, 0, ',', '.') }}</p>
            <p><strong>Max Partisipan:</strong> {{ $kelas->max_participants }}</p>
        </div>

        <hr>

        {{-- Jadwal Kelas --}}
        <div>
            <h3 class="text-lg font-semibold mb-2">Jadwal Kelas</h3>
            @forelse($kelas->schedules as $jadwal)
                <div class="p-2 border rounded mb-2">
                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($jadwal->date)->format('d M Y') }}</p>
                    <p><strong>Waktu:</strong> {{ $jadwal->start_time }} - {{ $jadwal->end_time }}</p>
                    <p><strong>Instruktur:</strong> {{ $jadwal->instructor_name }}</p>
                </div>
            @empty
                <p class="text-gray-500">Belum ada jadwal ditambahkan.</p>
            @endforelse
        </div>

        {{-- Aksi Admin (opsional) --}}
        @auth
            @if(auth()->user()->role === 'admin')
                <div class="mt-4 space-x-4">
                    <a href="{{ route('kelas.edit', [$subcategory->id, $kelas->id]) }}" class="text-blue-500">Edit Kelas</a>

                    <a href="{{ route('jadwal.create', $kelas->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded">
                        + Tambah Jadwal
                    </a>
                </div>
            @endif
        @endauth

    </div>
</x-app-layout>