<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\TaskAdminController;
use App\Http\Controllers\admin\TeacherAdminController;
use App\Http\Controllers\admin\PicketTeacherAdminController;
use App\Http\Controllers\admin\RecapAdminController;
use App\Http\Controllers\admin\ManageUserAdminController;
use App\Http\Controllers\guru\DashboardGuruController;
use App\Http\Controllers\guru\TaskGuruController;
use App\Http\Controllers\guru\TeacherGuruController;
use App\Http\Controllers\guru\PicketTeacherkGuruController;
use App\Http\Controllers\guru\RecapGuruController;

// Redirect ke dashboard admin sebagai default
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Route untuk halaman utama admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');

    // Route untuk halaman teacher
    Route::get('/teacher', [TeacherAdminController::class, 'index'])->name('teacher.index');  // <-- PASTIKAN INI ADA
    Route::get('/teacher/create', [TeacherAdminController::class, 'create'])->name('teacher.create');
    Route::post('/teacher', [TeacherAdminController::class, 'store'])->name('teacher.store');
    Route::get('/teacher/{teacher}/edit', [TeacherAdminController::class, 'edit'])->name('teacher.edit');
    Route::put('/teacher/{teacher}', [TeacherAdminController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{teacher}', [TeacherAdminController::class, 'destroy'])->name('teacher.destroy');

    // Route untuk halaman task
    Route::get('/tasks', [TaskAdminController::class, 'index'])->name('task.index');
    Route::get('/tasks/create', [TaskAdminController::class, 'create'])->name('task.create');
    Route::post('/tasks', [TaskAdminController::class, 'store'])->name('task.store');
    Route::get('/tasks/{task}/edit', [TaskAdminController::class, 'edit'])->name('task.edit');
    Route::put('/tasks/{task}', [TaskAdminController::class, 'update'])->name('task.update');
    Route::delete('/tasks/{task}', [TaskAdminController::class, 'destroy'])->name('task.destroy');


    Route::get('/recap', [RecapAdminController::class, 'index'])->name('recap');
    Route::get('/manageUser', [ManageUserAdminController::class, 'index'])->name('manageUser');


    // Route untuk halaman picket teacher
    Route::get('/picketTeacher', [PicketTeacherAdminController::class, 'index'])->name('picketTeacher.index');
    Route::get('/picketTeacher/create', [PicketTeacherAdminController::class, 'create'])->name('picketTeacher.create');
    Route::post('/picketTeacher', [PicketTeacherAdminController::class, 'store'])->name('picketTeacher.store');
    Route::get('/picketTeacher/{guruPiket}/edit', [PicketTeacherAdminController::class, 'edit'])->name('picketTeacher.edit');
    Route::put('/picketTeacher/{guruPiket}', [PicketTeacherAdminController::class, 'update'])->name('picketTeacher.update');
    Route::delete('/picketTeacher/{guruPiket}', [PicketTeacherAdminController::class, 'destroy'])->name('picketTeacher.destroy');

    });

    Route::prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [DashboardGuruController::class, 'index'])->name('dashboard');
    Route::get('/task', [TaskGuruController::class, 'index'])->name('task');
    Route::get('/teacher', [TeacherGuruController::class, 'index'])->name('teacher');
    Route::get('/picketTeacher', [PicketTeacherkGuruController::class, 'index'])->name('picketTeacher');
    Route::get('/recap', [RecapGuruController::class, 'index'])->name('recap');

    });
