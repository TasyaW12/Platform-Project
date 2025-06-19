<x-app-layout>
    <div class="flex min-h-screen bg-pink-50">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-pink-100 p-5 hidden md:block shadow-md">
            <h2 class="text-2xl font-bold text-pink-700 mb-6">🎀 Kategori</h2>
            <ul class="space-y-3">
                @foreach ($kategoriList as $kategori)
                    <li>
                        <button onclick="toggle('kategori-{{ $kategori->id }}')"
                            class="w-full text-left font-semibold text-pink-700 hover:text-pink-900 transition">
                            {{ $kategori->name }}
                        </button>
                        <ul id="kategori-{{ $kategori->id }}" class="ml-4 mt-2 hidden space-y-1 text-pink-600">
                            @foreach ($kategori->subcategories as $sub)
                                <li>
                                    <a href="{{ route('subkategori.kelas.index', $sub->id) }}" class="hover:underline">
                                        • {{ $sub->name }}
                                    </a>
                                </li>
                            @endforeach
                            <li class="mt-2">
                                <a href="{{ route('subkategori.create', $kategori->id) }}"
                                    class="text-sm text-pink-500 hover:underline">
                                    ➕ Tambah Subkategori
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('subkategori.index', $kategori->id) }}"
                                    class="text-sm text-pink-500 hover:underline">
                                    🛠 Kelola Subkategori
                                </a>
                            </li>
                        </ul>
                    </li>
                @endforeach
                <li class="pt-6 border-t border-pink-300">
                    <a href="{{ route('kategori.create') }}" class="text-pink-600 font-semibold hover:underline">
                        ➕ Tambah Kategori
                    </a>
                </li>
                <li>
                    <a href="{{ route('kategori.index') }}" class="text-pink-600 font-semibold hover:underline">
                        🛠 Kelola Kategori
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <button class="md:hidden mb-4" onclick="toggle('sidebar')">
                <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <h2 class="text-3xl font-bold text-pink-600 mb-6">📋 Booking Masuk</h2>

            @if(session('success'))
                <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @forelse($bookings as $booking)
                    <div class="bg-white border-l-4 border-pink-400 rounded-lg shadow-lg p-6 mb-6">
                        <p class="mb-2"><strong class="text-pink-600">👤 Nama User:</strong> {{ $booking->user->name }}</p>
                        <p class="mb-2"><strong class="text-pink-600">📘 Kelas:</strong> {{ $booking->schedule->kelas->title }}
                        </p>
                        <p class="mb-2"><strong class="text-pink-600">📅 Tanggal:</strong> {{ $booking->schedule->date }}</p>
                        <p class="mb-2"><strong class="text-pink-600">⏰ Waktu:</strong> {{ $booking->schedule->start_time }} -
                            {{ $booking->schedule->end_time }}</p>
                        <p><strong class="text-pink-600">📌 Status Saat Ini:</strong>
                            <span class="px-2 py-1 rounded text-sm font-medium
                                    {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-800' :
                ($booking->status == 'rejected' ? 'bg-red-100 text-red-800' :
                    'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </p>

                        @if($booking->status == 'pending')
                            <div class="flex gap-3 mt-4">
                                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">✅
                                        Konfirmasi</button>
                                </form>
                                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="rejected">
                                    <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">❌
                                        Tolak</button>
                                </form>
                            </div>
                        @endif
                    </div>
            @empty
                <p class="text-center text-gray-500 italic">Belum ada booking masuk.</p>
            @endforelse
        </main>
    </div>

    <script>
        function toggle(id) {
            const el = document.getElementById(id);
            if (el) el.classList.toggle('hidden');
        }
    </script>
</x-app-layout>