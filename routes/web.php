<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/halo', function () {
    return 'Halo Laravel!';
});
Route::get('/home', [HomeController::class, 'index']);

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::middleware(['auth'])->group(function () {
    // Admin & Staff bisa lihat daftar buku
    Route::middleware(['role:admin,staff'])->group(function () {
        Route::resource('books', BookController::class);
    });

    // Dashboard khusus admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});

require __DIR__.'/auth.php';
