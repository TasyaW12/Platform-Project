<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubkategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

// Rute untuk Login hanya untuk pengguna yang belum login (guest)
Route::middleware('guest')->get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::middleware('guest')->post('/login', [AuthenticatedSessionController::class, 'store']);

// Rute untuk Register
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Rute untuk User
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

});

// Rute untuk Admin
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
