<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubkategoriController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

// Kategori Routes
Route::resource('kategori', KategoriController::class);

// Subkategori Routes
Route::prefix('kategori/{category_id}/subkategori')->group(function () {
    Route::get('/', [SubkategoriController::class, 'index'])->name('subkategori.index');
    Route::get('create', [SubkategoriController::class, 'create'])->name('subkategori.create');
    Route::post('/', [SubkategoriController::class, 'store'])->name('subkategori.store');
    Route::get('{id}/edit', [SubkategoriController::class, 'edit'])->name('subkategori.edit');
    Route::patch('{id}', [SubkategoriController::class, 'update'])->name('subkategori.update');
    Route::delete('{id}', [SubkategoriController::class, 'destroy'])->name('subkategori.destroy');
});
// Rute untuk kelas
Route::prefix('subkategori/{subcategory_id}/kelas')->group(function () {
    Route::get('/', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('create', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('/', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('{id}/edit', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::patch('{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
