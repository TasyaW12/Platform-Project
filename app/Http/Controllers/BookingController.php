<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {
        $schedules = Schedule::all();
        return view('booking.create', compact('schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
        ]);
        $user_id = Auth::id();
        $schedule = Schedule::findOrFail($request->schedule_id); 

        $currentBookings = Booking::where('schedule_id', $schedule->id)->count();

        if (!isset($schedule->max_participants)) {
            return redirect()->back()->withErrors(['Kuota maksimal belum disetting pada jadwal ini.']);
        }

        if ($currentBookings >= $schedule->max_participants) {
            return redirect()->back()->withErrors(['Jadwal ini sudah penuh. Silakan pilih jadwal lain.']);
        }

        Booking::create([
            'user_id' => Auth::id(),
            'schedule_id' => $request->schedule_id,
            'booking_date' => now(),
            'payment_status' => 'pending',
        ]);

        return redirect()->route('booking.list')->with('success', 'Berhasil booking!');
    }

    public function list()
    {
        $bookings = Booking::with('schedule')->where('user_id', Auth::id())->get();
        return view('booking.list', compact('bookings'));
    }
}
