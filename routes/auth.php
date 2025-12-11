<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Http\Request;

// Login Routes
Route::get('login', [LoginController::class, 'create'])
    ->name('login')
    ->middleware('guest');

Route::post('login', [LoginController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');

// Logout Route
Route::post('logout', [LoginController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

// Registration Routes (if needed)
Route::get('register', [RegisterController::class, 'create'])
    ->name('register')
    ->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])
    ->name('register.store')
    ->middleware('guest');

// Password Reset Routes
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request')
    ->middleware('guest');

Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email')
    ->middleware('guest');

Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset')
    ->middleware('guest');

Route::post('reset-password', [NewPasswordController::class, 'store'])
    ->name('password.store')
    ->middleware('guest');

// Confirm Password
Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
    ->name('password.confirm')
    ->middleware('auth');

Route::post('confirm-password', [ConfirmablePasswordController::class, 'store'])
    ->name('password.confirm.store')
    ->middleware('auth');

// Password Update
Route::put('password', [PasswordController::class, 'update'])
    ->name('password.update')
    ->middleware('auth');
