<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Booking;

class UserController extends Controller
{

    public function index()
    {
        $kategoriList = Category::with('subcategories')->get();

        // Ambil semua booking milik user login
        $bookings = Booking::with('schedule.kelas')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('user.dashboard', compact('kategoriList', 'bookings'));
    }
}

