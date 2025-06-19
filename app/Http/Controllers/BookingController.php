<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => ['required', 'exists:schedules,id'],
        ]);

        // Cek apakah user sudah pernah booking jadwal ini
        $alreadyBooked = Booking::where('user_id', auth()->id())
            ->where('schedule_id', $request->schedule_id)
            ->exists();

        if ($alreadyBooked) {
            return redirect()->back()->with('error', 'Kamu sudah booking jadwal ini.');
        }

        Booking::create([
            'user_id' => auth()->id(),
            'schedule_id' => $request->schedule_id,
            'booking_date' => now(),
            'payment_status' => 'pending',
            'status' => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil');

    }
    public function index()
    {
        $bookings = Booking::with('schedule.kelas')->where('user_id', auth()->id())->latest()->get();
        return view('bookings.index', compact('bookings'));
    }
    public function destroy(Booking $booking)
    {
        // Hanya izinkan user yang punya booking
        if ($booking->user_id !== auth()->id()) {
            abort(403);
        }

        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dibatalkan.');
    }
    public function adminIndex()
    {
        $bookings = Booking::with(['user', 'schedule.kelas'])->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }
    // BookingController.php

    public function adminBookingList()
    {
        $bookings = \App\Models\Booking::with('user', 'schedule.kelas')->latest()->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = \App\Models\Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->back()->with('success', 'Status booking diperbarui.');
    }



}
