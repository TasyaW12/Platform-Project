<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
     public function index()
    {
        // Mengarahkan ke view dashboard admin
        return view('admin.dashboard');  // Pastikan kamu memiliki view untuk admin dashboard
    }
}
