@php
    use Illuminate\Support\Str;
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-extrabold text-pink-600 text-center">{{ $kelas->title }}</h2>
    </x-slot>

    <div class="max-w-6xl mx-auto px-6 py-8 bg-white rounded-lg shadow space-y-10">

        {{-- Gambar Besar --}}
        @if($kelas->image_url)
            <div class="overflow-hidden rounded-xl shadow-lg">
                @if(Str::startsWith($kelas->image_url, ['http://', 'https://']))
                    <img src="{{ $kelas->image_url }}" alt="{{ $kelas->title }}" class="w-full h-80 object-cover">
                @else
                    <img src="{{ asset('storage/' . $kelas->image_url) }}" alt="{{ $kelas->title }}"
                        class="w-full h-80 object-cover">
                @endif
            </div>
        @endif

        {{-- Informasi Utama --}}
        <div class="grid md:grid-cols-2 gap-8">
            <div class="space-y-3 text-gray-800">
                <div>
                    <h3 class="text-lg font-semibold text-pink-500">Subkategori</h3>
                    <p class="text-xl">{{ $subcategory->name }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-pink-500">Deskripsi</h3>
                    <p class="text-justify leading-relaxed">{{ $kelas->description }}</p>
                </div>
            </div>

            <div class="space-y-3 text-gray-800">
                <div>
                    <h3 class="text-lg font-semibold text-pink-500">Harga</h3>
                    <p class="text-xl">Rp {{ number_format($kelas->price, 0, ',', '.') }}</p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-pink-500">Max Partisipan</h3>
                    <p class="text-xl">{{ $kelas->max_participants }} Orang</p>
                </div>
            </div>
        </div>

        {{-- Jadwal Kelas --}}
        <div>
            <br>
            <h3 class="text-2xl font-semibold text-pink-600 mb-5">📅 Jadwal Kelas</h3>
            @forelse($kelas->schedules as $jadwal)
                <div class="grid md:grid-cols-3 gap-6 bg-pink-50 border border-pink-200 p-4 rounded-lg shadow mb-4">
                    <p><span
                            class="font-semibold text-pink-700">Tanggal:</span><br>{{ \Carbon\Carbon::parse($jadwal->date)->format('d M Y') }}
                    </p>
                    <p><span class="font-semibold text-pink-700">Waktu:</span><br>{{ $jadwal->start_time }} –
                        {{ $jadwal->end_time }}
                    </p>
                    <p><span class="font-semibold text-pink-700">Instruktur:</span><br>{{ $jadwal->instructor_name }}</p>
                    @auth
                        @if(auth()->user()->role === 'user')
                            <form action="{{ route('bookings.store') }}" method="POST" class="mt-3">
                                @csrf
                                <input type="hidden" name="schedule_id" value="{{ $jadwal->id }}">
                                <button type="submit"
                                    class="bg-pink-600 text-white px-4 py-2 rounded-md shadow hover:bg-pink-700 transition">
                                    Booking Sekarang
                                </button>
                            </form>
                        @endif
                    @endauth
                </div>
            @empty
                <p class="text-gray-500 italic">Belum ada jadwal ditambahkan.</p>
            @endforelse
        </div>

        {{-- Aksi Admin --}}
        @auth
            @if(auth()->user()->role === 'admin')
                <div class="flex flex-col md:flex-row gap-4 pt-6 border-t border-gray-200">
                    <a href="{{ route('kelas.edit', [$subcategory->id, $kelas->id]) }}"
                        class="inline-block px-6 py-2 text-pink-600 border border-pink-500 rounded hover:bg-pink-100 transition">
                        ✏️ Edit Kelas
                    </a>
                    <a href="{{ route('jadwal.create', $kelas->id) }}"
                        class="inline-block px-6 py-2 text-pink-600 border border-pink-500 rounded hover:bg-pink-100 transition">
                        ➕ Tambah Jadwal
                    </a>
                </div>

            @endif
        @endauth

    </div>
</x-app-layout>