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
