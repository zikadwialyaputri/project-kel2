<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/halo', function () {
    return 'Halo Laravel!';
});
Route::get('/home', [HomeController::class, 'index']);

// Route::get('/', [BookController::class, 'publicIndex'])->name('home'); // GUEST katalog

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Admin + Staff bisa akses ini (dibedain di Blade)
    // Route::resource('books', BookController::class);

    // // Peminjaman: fokus ke Staff + Admin
    // Route::resource('loans', LoanController::class)->middleware('role:admin,staff');
});

// Admin only: kelola staff
// Route::middleware(['auth', 'role:admin'])
//     ->prefix('admin')
//     ->name('admin.')
// //     ->group(function () {
// //         Route::resource('users', UserController::class);
// //     });

// require __DIR__ . '/auth.php';
