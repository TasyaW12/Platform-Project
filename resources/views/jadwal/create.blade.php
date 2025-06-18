<x-app-layout>
    <x-slot name="header">
        <h2>Tambah Jadwal untuk Kelas: {{ $kelas->title }}</h2>
    </x-slot>

    <div class="p-4">
        <form action="{{ route('jadwal.store', $kelas->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="date" class="block">Tanggal</label>
                <input type="date" name="date" id="date" class="w-full border" required>
            </div>

            <div class="mb-4">
                <label for="start_time" class="block">Jam Mulai</label>
                <input type="time" name="start_time" id="start_time" class="w-full border" required>
            </div>

            <div class="mb-4">
                <label for="end_time" class="block">Jam Selesai</label>
                <input type="time" name="end_time" id="end_time" class="w-full border" required>
            </div>

            <div class="mb-4">
                <label for="instructor_name" class="block">Nama Instruktur</label>
                <input type="text" name="instructor_name" id="instructor_name" class="w-full border" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Simpan Jadwal</button>
        </form>
    </div>
</x-app-layout>