<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div id="sidebar" class="w-64 bg-pink-100 p-4 space-y-4 hidden md:block">
            <h2 class="text-xl font-bold mb-4">Kategori</h2>
            <ul class="space-y-2 ml-2">
                <li>
                    <button onclick="toggle('beauty-sub')" class="font-semibold text-left w-full">Beauty</button>
                    <ul id="beauty-sub" class="ml-4 mt-1 space-y-1 hidden text-sm text-pink-700">
                        <li>Facial</li>
                        <li>Make Up</li>
                        <li>Hair Styling</li>
                    </ul>
                </li>
                <li>
                    <button onclick="toggle('cooking-sub')" class="font-semibold text-left w-full">Cooking</button>
                    <ul id="cooking-sub" class="ml-4 mt-1 space-y-1 hidden text-sm text-pink-700">
                        <li>Healthy Food</li>
                        <li>Snack</li>
                        <li>Baking</li>
                    </ul>
                </li>
                <li>
                    <button onclick="toggle('creative-sub')" class="font-semibold text-left w-full">Creative Touch</button>
                    <ul id="creative-sub" class="ml-4 mt-1 space-y-1 hidden text-sm text-pink-700">
                        <li>Crafting</li>
                        <li>Handlettering</li>
                        <li>DIY Gifts</li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Hamburger button for mobile -->
            <button class="md:hidden mb-4" onclick="toggle('sidebar')">
                <svg class="w-6 h-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <h1 class="text-2xl font-bold mb-4">Welcome to Lova Life!</h1>
            <p class="text-gray-700">Silakan pilih kategori di menu sebelah kiri atau tekan tombol di atas 👆</p>

            <!-- Additional content or sections here -->
            <div class="mt-6">
                <h2 class="text-xl font-semibold text-pink-600">New Offers</h2>
                <p>Discover exciting new offers and categories for you!</p>
            </div>
        </div>
    </div>

    <script>
        // Toggle function for sidebar visibility
        function toggle(id) {
            const el = document.getElementById(id);
            el.classList.toggle('hidden');
        }
    </script>
</x-app-layout>
