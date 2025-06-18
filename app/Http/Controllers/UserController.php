<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class UserController extends Controller
{

    public function index()
    {
        $kategoriList = Category::with('subcategories')->get();
        return view('user.dashboard', compact('kategoriList'));

    }
}

