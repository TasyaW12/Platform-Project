<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubkategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookingController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

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

    Route::prefix('subkategori/{subcategory_id}/kelas')->group(function () {
        Route::get('/', [KelasController::class, 'index'])->name('subkategori.kelas.index');
    });
    //Route::get('/', [KelasController::class, 'index'])->name('subkategori.kelas.index');

    Route::get('subkategori/{subcategory_id}/kelas/{id}', [KelasController::class, 'show'])->name('kelas.show');

    Route::get('subkategori/{subcategory_id}/kelas/{id}', [KelasController::class, 'show'])
        ->where('id', '[0-9]+')  // supaya tidak konflik dengan "create"
        ->name('kelas.show');
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');


});




// Rute untuk Admin
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD untuk Kategori
    Route::get('kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::patch('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');


    // CRUD untuk Subkategori
    Route::prefix('kategori/{category_id}/subkategori')->group(function () {
        Route::get('/', [SubkategoriController::class, 'index'])->name('subkategori.index');
        Route::get('create', [SubkategoriController::class, 'create'])->name('subkategori.create');
        Route::post('/', [SubkategoriController::class, 'store'])->name('subkategori.store');
        Route::get('{id}/edit', [SubkategoriController::class, 'edit'])->name('subkategori.edit');
        Route::patch('{id}', [SubkategoriController::class, 'update'])->name('subkategori.update');
        Route::delete('{id}', [SubkategoriController::class, 'destroy'])->name('subkategori.destroy');
    });



    // CRUD untuk Kelas
    Route::prefix('subkategori/{subcategory_id}/kelas')->group(function () {

        // Route create HARUS di atas semua dynamic {id}
        Route::get('create', [KelasController::class, 'create'])->name('kelas.create');

        // Route untuk menyimpan kelas baru
        //Route::post('subkategori/{subcategory_id}/kelas', [KelasController::class, 'store'])->name('kelas.store');

        Route::post('/', [KelasController::class, 'store'])->name('subkategori.kelas.store');


        // Batasi ID untuk edit/update/delete hanya angka agar tidak bentrok dengan 'create'
        Route::get('{id}/edit', [KelasController::class, 'edit'])
            ->where('id', '[0-9]+')
            ->name('kelas.edit');

        Route::patch('{id}', [KelasController::class, 'update'])
            ->where('id', '[0-9]+')
            ->name('kelas.update');

        Route::delete('{id}', [KelasController::class, 'destroy'])
            ->where('id', '[0-9]+')
            ->name('kelas.destroy');


    });
    // Tampilkan semua booking
    Route::get('/admin/bookings', [BookingController::class, 'adminBookingList'])->name('admin.bookings');

    // Update status booking
    Route::patch('/admin/bookings/{id}', [BookingController::class, 'updateStatus'])->name('admin.bookings.update');


});
Route::prefix('kelas/{kelas_id}/jadwal')->group(function () {
    Route::get('create', [ScheduleController::class, 'create'])->name('jadwal.create');
    Route::post('/', [ScheduleController::class, 'store'])->name('jadwal.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__ . '/auth.php';
