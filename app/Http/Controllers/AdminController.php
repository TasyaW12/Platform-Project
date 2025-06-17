<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $kategoriList = Category::with('subcategories')->get();
        // Mengarahkan ke view dashboard admin
        return view('admin.dashboard', compact('kategoriList'));  // Pastikan kamu memiliki view untuk admin dashboard
    }
}
