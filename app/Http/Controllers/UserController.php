<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
    {
        // Mengarahkan ke view dashboard user
        return view('user.dashboard');  // Pastikan kamu memiliki view untuk user dashboard
    }
}

