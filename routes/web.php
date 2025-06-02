<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('welcome');
    
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking-list', [BookingController::class, 'list'])->name('booking.list');
});