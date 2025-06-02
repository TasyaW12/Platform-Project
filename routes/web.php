<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\TestimoniController;

Route::get('/', function () {
    return view('welcome');
    
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking-list', [BookingController::class, 'list'])->name('booking.list');
});

Route::middleware('auth')->group(function() {
    Route::get('/testimoni/create/{class_id}', [TestimoniController::class, 'create'])->name('testimoni.create')->middleware('auth');
    Route::post('/testimoni/store', [TestimoniController::class, 'store'])->name('testimoni.store')->middleware('auth');
    Route::get('/testimoni/list', [TestimoniController::class, 'list'])->name('testimoni.list')->middleware('auth');
});