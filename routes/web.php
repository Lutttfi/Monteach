<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\GuruPiketController;

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Grouping route untuk admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('/guru', GuruController::class);
    Route::resource('/guruPiket', GuruPiketController::class);
});
Route::get('/tugas', function () {
    return view('admin.task');
})->name('tugas');
Route::get('/rekap', function () {
    return view('admin.recap'); // Sesuaikan dengan lokasi file Blade
})->name('rekap');

Route::get('/manageUser', function () {
    return view('admin.manageUser'); // Sesuaikan dengan lokasi file Blade
})->name('manageUser');