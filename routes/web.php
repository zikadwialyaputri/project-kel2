<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/halo', function () {
    return 'Halo Laravel!';
});
Route::get('/home', [HomeController::class, 'index']);
