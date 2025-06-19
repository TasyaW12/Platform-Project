<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-pink-100 p-4 space-y-4 hidden md:block overflow-y-auto">
            <h2 class="text-xl font-bold mb-4">Kategori</h2>

            <ul class="space-y-2 ml-2">
                @foreach ($kategoriList as $kategori)
                    <li>
                        <!-- Toggle tombol kategori -->
                        <button onclick="toggle('kategori-{{ $kategori->id }}')" class="font-semibold text-left w-full">
                            {{ $kategori->name }}
                        </button>

                        <!-- Subkategori -->
                        <ul id="kategori-{{ $kategori->id }}" class="ml-4 mt-1 space-y-1 hidden text-sm text-pink-700">
                            @foreach ($kategori->subcategories as $sub)
                                <li class="ml-2">
                                    <a href="{{ route('subkategori.kelas.index', $sub->id) }}" class="hover:underline">
                                        • {{ $sub->name }}
                                    </a>

                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Hamburger button -->
            <button class="md:hidden mb-4" onclick="toggle('sidebar')">
                <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <h1 class="text-2xl font-bold mb-4">Welcome to Lova Life!</h1>
            <hr class="my-6">

            <h3 class="text-lg font-bold mb-3">Riwayat Booking Anda:</h3>

            @if($bookings->isEmpty())
                <p class="text-gray-500 italic">Belum ada booking yang dilakukan.</p>
            @else
                @foreach($bookings as $booking)
                    <div class="mb-4 p-4 border rounded shadow-sm bg-white">
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
                        @if($booking->status === 'pending')
                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin membatalkan booking ini?')" class="mt-2">
                                @csrf
                                @method('DELETE')
                                <button class="text-sm text-red-600 hover:underline">❌ Batalkan</button>
                            </form>
                        @endif

                    </div>
                @endforeach
            @endif

            </p>
        </div>
    </div>

    <script>
        function toggle(id) {
            const el = document.getElementById(id);
            if (el) el.classList.toggle('hidden');
        }
    </script>
</x-app-layout>