<x-app-layout>
    <div class="flex min-h-screen bg-pink-50"> <!-- ubah dari h-screen ke min-h-screen -->

        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-pink-100 p-4 shadow-md border-r border-pink-200">
            <h2 class="text-xl font-bold text-pink-600 mb-4">🎀 Kategori</h2>

            <ul class="space-y-3 text-sm">
                @foreach ($kategoriList as $kategori)
                    <li>
                        <p class="font-semibold text-gray-800">{{ $kategori->name }}</p>
                        <ul class="ml-4 text-pink-700 space-y-1">
                            @foreach ($kategori->subcategories as $sub)
                                <li>
                                    <a href="{{ route('subkategori.kelas.index', $sub->id) }}" class="hover:underline">
                                        • {{ $sub->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </aside>

        <!-- Konten Utama -->
        <main class="flex-1 p-6">
            <h1 class="text-xl font-semibold text-pink-700 mb-3">Welcome to Lova Life!</h1>
            <h3 class="text-lg font-bold text-pink-600 mb-2">📌 Riwayat Booking Anda:</h3>

            @if($bookings->isEmpty())
                <p class="text-gray-500 italic">Belum ada booking yang dilakukan.</p>
            @else
                @foreach($bookings as $booking)
                    <div class="bg-white p-4 rounded-lg border shadow-sm mb-4">
                        <p><strong>Kelas:</strong> {{ $booking->schedule->kelas->title }}</p>
                        <p><strong>Tanggal:</strong> {{ $booking->schedule->date }}</p>
                        <p><strong>Waktu:</strong> {{ $booking->schedule->start_time }} - {{ $booking->schedule->end_time }}</p>
                        <p><strong>Status:</strong>
                            <span class="text-sm px-2 py-1 rounded 
                                                                        {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' :
                    ($booking->status === 'confirmed' ? 'bg-green-100 text-green-800' :
                        'bg-red-100 text-red-800') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </p>
                        @if($bookings->isEmpty())
                            <div class="text-center mt-10 text-gray-600">
                                <img src="{{ asset('images/empty_booking.png') }}" alt="No booking yet"
                                    class="mx-auto mb-6 w-52 opacity-80">
                                <h4 class="text-xl font-semibold text-pink-600 mb-2">Belum ada booking yang dilakukan</h4>
                                <p class="mb-4">Yuk cari kelas yang menarik dan booking sekarang juga!</p>
                                <a href="{{ route('kategori.index') }}" class="btn btn-primary">🔍 Jelajahi Kelas</a>
                            </div>
                        @else
                            {{-- tampilkan booking seperti biasa --}}
                        @endif

                    </div>
                @endforeach
            @endif
        </main>
    </div>
</x-app-layout>