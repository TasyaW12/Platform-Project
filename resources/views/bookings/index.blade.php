<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Booking Saya</h2>
    </x-slot>

    <div class="p-6 space-y-4">
        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if($bookings->isEmpty())
            <p class="text-gray-500 italic">Belum ada booking.</p>
        @endif

        @foreach($bookings as $booking)
            <div class="p-4 border rounded shadow">
                <p><strong>Kelas:</strong> {{ $booking->schedule->kelas->title }}</p>
                <p><strong>Tanggal:</strong> {{ $booking->schedule->date }}</p>
                <p><strong>Waktu:</strong> {{ $booking->schedule->start_time }} - {{ $booking->schedule->end_time }}</p>
                <p><strong>Status:</strong>
                    <span class="px-2 py-1 rounded text-sm
                                            {{ $booking->status == 'confirmed' ? 'bg-green-100 text-green-800' :
            ($booking->status == 'rejected' ? 'bg-red-100 text-red-800' :
                'bg-yellow-100 text-yellow-800') }}">
                        {{ ucfirst($booking->status) }}
                    </span>
                </p>
                @if($booking->status === 'pending')
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin membatalkan booking ini?')" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 hover:underline">
                            ❌ Batalkan Booking
                        </button>
                    </form>
                @endif
            </div>


        @endforeach
    </div>
</x-app-layout>