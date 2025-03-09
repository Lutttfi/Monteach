<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\guru\TaskGuruController;
use App\Http\Controllers\guru\RecapGuruController;
use App\Http\Controllers\admin\RoleAdminController;
use App\Http\Controllers\admin\TaskAdminController;
use App\Http\Controllers\siswa\TaskSiswaController;
use App\Http\Controllers\admin\RecapAdminController;
use App\Http\Controllers\guru\TeacherGuruController;
use App\Http\Controllers\admin\TeacherAdminController;
use App\Http\Controllers\guru\DashboardGuruController;
use App\Http\Controllers\siswa\TeacherSiswaController;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\siswa\DashboardSiswaController;
use App\Http\Controllers\admin\ManageUserAdminController;
use App\Http\Controllers\guru\PicketTeacherGuruController;
use App\Http\Controllers\guruPiket\TaskGuruPiketController;
use App\Http\Controllers\admin\PicketTeacherAdminController;
use App\Http\Controllers\siswa\PicketTeacherSiswaController;
use App\Http\Controllers\siswa\KonfirmasiSiswaController;
use App\Http\Controllers\guruPiket\TeacherGuruPiketController;
use App\Http\Controllers\guruPiket\DashboardGuruPiketController;
use App\Http\Controllers\guruPiket\PicketTeacherGuruPiketController;
use App\Http\Controllers\guruPiket\RecapGuruPiketController;


// Redirect default ke halaman login jika belum login
Route::get('/', function () {
    return redirect()->route('login');
});

// Route untuk halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk admin setelah login
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        // Route untuk halaman dashboard
        Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

        // Route untuk halaman task
        Route::get('/tasks', [TaskAdminController::class, 'index'])->name('task.index');
        Route::get('/tasks/create', [TaskAdminController::class, 'create'])->name('task.create');
        Route::post('/tasks', [TaskAdminController::class, 'store'])->name('task.store');
        Route::get('/tasks/{task}/edit', [TaskAdminController::class, 'edit'])->name('task.edit');
        Route::put('/tasks/{task}', [TaskAdminController::class, 'update'])->name('task.update');
        Route::delete('/tasks/{task}', [TaskAdminController::class, 'destroy'])->name('task.destroy');

        // Route untuk halaman teacher
        Route::get('/teacher', [TeacherAdminController::class, 'index'])->name('teacher.index');
        Route::get('/teacher/create', [TeacherAdminController::class, 'create'])->name('teacher.create');
        Route::post('/teacher', [TeacherAdminController::class, 'store'])->name('teacher.store');
        Route::get('/teacher/{teacher}/edit', [TeacherAdminController::class, 'edit'])->name('teacher.edit');
        Route::put('/teacher/{teacher}', [TeacherAdminController::class, 'update'])->name('teacher.update');
        Route::delete('/teacher/{teacher}', [TeacherAdminController::class, 'destroy'])->name('teacher.destroy');

        // Route untuk halaman picket teacher
        Route::get('/picketTeacher', [PicketTeacherAdminController::class, 'index'])->name('picketTeacher.index');
        Route::get('/picketTeacher/create', [PicketTeacherAdminController::class, 'create'])->name('picketTeacher.create');
        Route::post('/picketTeacher', [PicketTeacherAdminController::class, 'store'])->name('picketTeacher.store');
        Route::get('/picketTeacher/{guruPiket}/edit', [PicketTeacherAdminController::class, 'edit'])->name('picketTeacher.edit');
        Route::put('/picketTeacher/{guruPiket}', [PicketTeacherAdminController::class, 'update'])->name('picketTeacher.update');
        Route::delete('/picketTeacher/{guruPiket}', [PicketTeacherAdminController::class, 'destroy'])->name('picketTeacher.destroy');

        // Route untuk halaman recap
        Route::get('/recap', [RecapAdminController::class, 'index'])->name('recap');

        // Route untuk halaman manage user
        Route::get('/pengguna', [ManageUserAdminController::class, 'index'])->name('manageUser.index');
        Route::get('/pengguna/create', [ManageUserAdminController::class, 'create'])->name('manageUser.create');
        Route::post('/pengguna', [ManageUserAdminController::class, 'store'])->name('manageUser.store');
        Route::get('/pengguna/{user}/edit', [ManageUserAdminController::class, 'edit'])->name('manageUser.edit');
        Route::put('/pengguna/{user}', [ManageUserAdminController::class, 'update'])->name('manageUser.update');
        Route::delete('/pengguna/{user}', [ManageUserAdminController::class, 'destroy'])->name('manageUser.destroy');

        // Route untuk halaman role
        Route::get('/role', [RoleAdminController::class, 'index'])->name('role.index');
        Route::get('/role/create', [RoleAdminController::class, 'create'])->name('role.create');
        Route::post('/role', [RoleAdminController::class, 'store'])->name('role.store');
        Route::get('/role/{role}/edit', [RoleAdminController::class, 'edit'])->name('role.edit');
        Route::put('/role/{role}', [RoleAdminController::class, 'update'])->name('role.update');
        Route::delete('/role/{role}', [RoleAdminController::class, 'destroy'])->name('role.destroy');
    });

    Route::prefix('guru')->name('guru.')->group(function () {
        Route::get('/dashboard', [DashboardGuruController::class, 'index'])->name('dashboard');
        // Route::get('/task', [TaskGuruController::class, 'index'])->name('task');
        Route::get('/teacher', [TeacherGuruController::class, 'index'])->name('teacher');
        Route::get('/picketTeacher', [PicketTeacherGuruController::class, 'index'])->name('picketTeacher');
        Route::get('/recap', [RecapGuruController::class, 'index'])->name('recap');
    });

    Route::prefix('guruPiket')->name('guruPiket.')->group(function () {
        Route::get('/dashboard', [DashboardGuruPiketController::class, 'index'])->name('dashboard');
        Route::get('/task', [TaskGuruPiketController::class, 'index'])->name('task');
        Route::get('/task/{id}/absen', [TaskGuruPiketController::class, 'absen'])->name('absen');
        Route::post('/task/{id}/submitAbsen', [TaskGuruPiketController::class, 'submitAbsen'])->name('submitAbsen');;
        Route::get('/teacher', [TeacherGuruPiketController::class, 'index'])->name('teacher');
        Route::get('/picketTeacher', [PicketTeacherGuruPiketController::class, 'index'])->name('picketTeacher');
        Route::get('/recap', [RecapGuruPiketController::class, 'index'])->name('recap');
    });

    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/dashboard', [DashboardSiswaController::class, 'index'])->name('dashboard');
        Route::get('/task', [KonfirmasiSiswaController::class, 'task'])->name('task');
        Route::get('/teacher', [TeacherSiswaController::class, 'index'])->name('teacher');
        Route::get('/picketTeacher', [PicketTeacherSiswaController::class, 'index'])->name('picketTeacher');
        Route::get('/konfirmasi', [KonfirmasiSiswaController::class, 'index'])->name('konfirmasi.index');
        Route::post('/konfirmasi/{id}', [KonfirmasiSiswaController::class, 'konfirmasi'])->name('konfirmasi');
    });

});