<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeacherAdminController;
use App\Http\Controllers\PicketTeacherAdminController;

Route::get('/', function () {
    return view('auth.login');
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

    Route::resource('/guru', TeacherAdminController::class);
    Route::resource('/guruPiket', PicketTeacherAdminController::class);
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









Route::middleware(['auth'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', function () {
        return view('guru.dashboard');
    })->name('dashboard');

    Route::get('/tugas', function () {
        return view('guru.tugas'); 
    })->name('tugas');

    Route::get('/guru', [GuruController::class, 'guruIndex'])->name('guru'); // Sudah benar

    Route::get('/guruPiket', [GuruController::class, 'guruPiket'])->name('guruPiket'); // Sudah benar

    Route::get('/rekap', function () {
        return view('guru.rekap');
    })->name('rekap');
});

