<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Booking;

class AdminController extends Controller
{
    public function index()
    {
        $kategoriList = Category::with('subcategories')->get();
        $bookings = Booking::with('user', 'schedule.kelas')->get();

        return view('admin.dashboard', compact('kategoriList', 'bookings'));
    }
}
