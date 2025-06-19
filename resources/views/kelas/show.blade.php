@php
    use Illuminate\Support\Str;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-extrabold text-center text-pink-700 tracking-wide leading-tight mb-6">
            ✨ {{ $kelas->title }}
        </h1>
    </x-slot>

    <div class="max-w-6xl mx-auto px-6 py-10 space-y-10">

        {{-- Gambar --}}
        @if($kelas->image_url)
            <div class="overflow-hidden rounded-xl shadow-lg max-w-3xl mx-auto">
                @if(Str::startsWith($kelas->image_url, ['http://', 'https://']))
                    <img src="{{ $kelas->image_url }}" alt="{{ $kelas->title }}"
                        class="w-full max-h-[400px] object-cover rounded-xl">
                @else
                    <img src="{{ asset('storage/' . $kelas->image_url) }}" alt="{{ $kelas->title }}"
                        class="w-full max-h-[400px] object-cover rounded-xl">
                @endif
            </div>

        @endif

        {{-- Info Kelas --}}
        <div class="grid md:grid-cols-2 gap-6">
            <div class="info-card">
                <div class="info-label">📖 Deskripsi</div>
                <div class="info-value">{{ $kelas->description }}</div>
            </div>
            <div class="info-card">
                <div class="info-label">💸 Harga</div>
                <div class="info-value">Rp {{ number_format($kelas->price, 0, ',', '.') }}</div>
            </div>
            <div class="info-card">
                <div class="info-label">👥 Max Partisipan</div>
                <div class="info-value">{{ $kelas->max_participants }} Orang</div>
            </div>
        </div>


        {{-- Jadwal --}}
        <div class="mt-10">
            <h3 class="text-2xl font-bold text-pink-600 mb-5 flex items-center gap-2">📅 Jadwal Kelas</h3>

            @forelse($kelas->schedules as $jadwal)
                <div class="bg-white border border-pink-200 p-6 rounded-xl shadow-sm mb-6">
                    <div class="grid md:grid-cols-3 gap-6 text-gray-700">
                        <div>
                            <p class="font-semibold text-pink-600 mb-1">Tanggal</p>
                            <p>{{ \Carbon\Carbon::parse($jadwal->date)->format('d M Y') }}</p>
                        </div>
                        <div>
                            <p class="font-semibold text-pink-600 mb-1">Waktu</p>
                            <p>
                                {{ \Carbon\Carbon::parse($jadwal->start_time)->format('H:i') }} –
                                {{ \Carbon\Carbon::parse($jadwal->end_time)->format('H:i') }} WIB
                            </p>
                        </div>
                        <div>
                            <p class="font-semibold text-pink-600 mb-1">Instruktur</p>
                            <p>{{ $jadwal->instructor_name }}</p>
                        </div>
                    </div>

                    @auth
                        @if(auth()->user()->role === 'user')
                            <form action="{{ route('bookings.store') }}" method="POST" class="mt-4">
                                @csrf
                                <input type="hidden" name="schedule_id" value="{{ $jadwal->id }}">
                                <button type="submit" class="btn-pink-cute mt-2">🛒 Booking Sekarang</button>
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
                    <a href="{{ route('kelas.edit', [$subcategory->id, $kelas->id]) }}" class="btn-outline-pink">
                        ✏️ Edit Kelas
                    </a>
                    <a href="{{ route('jadwal.create', $kelas->id) }}" class="btn-outline-pink">
                        ➕ Tambah Jadwal
                    </a>
                </div>
            @endif
        @endauth

        {{-- Form Testimoni --}}
        @auth
            @if(auth()->user()->role === 'user')
                <div class="mt-10">
                    <h3 class="text-2xl font-bold text-pink-600 mb-4">📝 Tulis Testimoni Anda</h3>
                    <form action="{{ route('testimonial.store') }}" method="POST"
                        class="space-y-4 bg-pink-50 p-6 rounded-xl shadow-md">
                        @csrf
                        <input type="hidden" name="class_id" value="{{ $kelas->id }}">

                        <div>
                            <label for="rating" class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                            <select name="rating" id="rating" required
                                class="w-full border-pink-300 rounded-md shadow-sm focus:ring-pink-400 focus:border-pink-400 text-lg">
                                <option value="">Pilih Rating</option>
                                <option value="5">★★★★★ - Sangat Bagus</option>
                                <option value="4">★★★★ - Bagus</option>
                                <option value="3">★★★ - Cukup</option>
                                <option value="2">★★ - Kurang</option>
                                <option value="1">★ - Buruk</option>
                            </select>
                        </div>

                        <div>
                            <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Komentar</label>
                            <textarea name="comment" id="comment" rows="3" required
                                class="w-full border border-pink-300 rounded-lg shadow-sm focus:ring-pink-400 focus:border-pink-400 text-gray-800 p-3"
                                placeholder="Bagaimana pendapat Anda tentang kelas ini?"></textarea>
                        </div>

                        <div>
                            <button type="submit" class="btn-pink-cute">💌 Kirim Testimoni</button>
                        </div>
                    </form>
                </div>
            @endif
        @endauth

        {{-- Tampilkan Testimoni --}}
        <div class="mt-10">
            <h3 class="text-2xl font-bold text-pink-600 mb-6">💬 Testimoni Peserta</h3>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($kelas->testimonials as $testimonial)
                    <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 flex gap-4 items-start">
                        <div
                            class="w-12 h-12 flex-shrink-0 rounded-full bg-pink-500 flex items-center justify-center text-white font-bold text-xl shadow">
                            {{ strtoupper(substr($testimonial->user->name, 0, 1)) }}
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-pink-600 text-lg mb-1">{{ $testimonial->user->name }}</p>
                            <p class="text-yellow-500 text-base mb-2">
                                @for ($i = 0; $i < $testimonial->rating; $i++) ★ @endfor
                            </p>
                            <p class="text-gray-800 text-base italic leading-relaxed">"{{ $testimonial->comment }}"</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 italic">Belum ada testimoni yang ditampilkan.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>