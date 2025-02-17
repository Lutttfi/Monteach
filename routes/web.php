<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\adminControllers\DashboardAdminController;

Route::get('/', function () {
    return view('admin.dashboard');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::get('/picketTeach', function () {
    return view('admin.picketTeach'); // Tambahkan 'admin.' karena ada di dalam folder admin
})->name('picketTeach');

Route::get('/tugas', function () {
    return view('admin.task');
})->name('tugas');

Route::get('/guru', function () {
    return view('admin.teacher'); // Sesuaikan dengan lokasi file Blade
})->name('guru');

Route::get('/rekap', function () {
    return view('admin.recap'); // Sesuaikan dengan lokasi file Blade
})->name('rekap');

Route::get('/manageUser', function () {
    return view('admin.manageUser'); // Sesuaikan dengan lokasi file Blade
})->name('manageUser');





Route::post('/logout', function () {
    return redirect('/login'); // Arahkan ke halaman login setelah logout
})->name('logout');