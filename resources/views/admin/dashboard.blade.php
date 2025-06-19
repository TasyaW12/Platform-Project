<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-pink-100 p-4 space-y-4 hidden md:block overflow-y-auto">
            <h2 class="text-xl font-bold mb-4">Kategori</h2>
            <ul class="space-y-2 ml-2">
                @foreach ($kategoriList as $kategori)
                    <li>
                        <!-- Tombol Toggle Kategori -->
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

                            <li class="mt-2">
                                <a href="{{ route('subkategori.create', $kategori->id) }}"
                                    class="text-pink-500 hover:underline">
                                    ➕ Tambah Subkategori
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('subkategori.index', $kategori->id) }}"
                                    class="text-pink-500 hover:underline">
                                    🛠 Kelola Subkategori
                                </a>
                            </li>
                        </ul>
                    </li>
                @endforeach

                <li class="pt-4 border-t border-pink-300">
                    <a href="{{ route('kategori.create') }}" class="text-pink-500 font-semibold hover:underline">
                        ➕ Tambah Kategori
                    </a>
                </li>
                <li>
                    <a href="{{ route('kategori.index') }}" class="text-pink-500 font-semibold hover:underline">
                        🛠 Kelola Kategori
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Hamburger Button (Mobile) -->
            <button class="md:hidden mb-4" onclick="toggle('sidebar')">
                <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Konten Utama -->
            <hr class="my-6">

            <h2 class="text-xl font-bold text-pink-600 mb-4">📋 Booking Masuk</h2>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @forelse($bookings as $booking)
                    <div class="bg-white p-4 mb-4 border rounded shadow">
                        <p><strong>Nama User:</strong> {{ $booking->user->name }}</p>
                        <p><strong>Kelas:</strong> {{ $booking->schedule->kelas->title }}</p>
                        <p><strong>Tanggal:</strong> {{ $booking->schedule->date }}</p>
                        <p><strong>Waktu:</strong> {{ $booking->schedule->start_time }} - {{ $booking->schedule->end_time }}</p>
                        <p><strong>Status Saat Ini:</strong>
                            <span class="px-2 py-1 rounded text-sm
                                {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-800' :
                ($booking->status == 'rejected' ? 'bg-red-100 text-red-800' :
                    'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </p>

                        @if($booking->status == 'pending')
                            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="mt-3 flex gap-2">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="confirmed">
                                <button class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600">
                                    ✅ Konfirmasi
                                </button>
                            </form>

                            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="mt-3">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="rejected">
                                <button class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600">
                                    ❌ Tolak
                                </button>
                            </form>
                        @endif
                    </div>
            @empty
                <p class="text-gray-500 italic">Belum ada booking.</p>
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