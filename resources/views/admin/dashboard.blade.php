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
                                    <a href="{{ route('kelas.index', $sub->id) }}" class="hover:underline">
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
            <h1 class="text-2xl font-bold mb-4">Welcome to Lova Life!</h1>
            <p class="text-gray-700">Silakan pilih kategori di menu sebelah kiri atau tekan tombol di atas 👆</p>

            <div class="mt-6">
                <h2 class="text-xl font-semibold text-pink-600">🎁 New Offers</h2>
                <p class="text-gray-600">Discover exciting new offers and categories for you!</p>
            </div>
        </main>
    </div>

    <script>
        function toggle(id) {
            const el = document.getElementById(id);
            if (el) el.classList.toggle('hidden');
        }
    </script>
</x-app-layout>