<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\TaskAdminController;
use App\Http\Controllers\admin\TeacherAdminController;
use App\Http\Controllers\admin\PicketTeacherAdminController;
use App\Http\Controllers\admin\RecapAdminController;
use App\Http\Controllers\admin\ManageUserAdminController;

// Redirect ke dashboard admin sebagai default
Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

<<<<<<< HEAD
Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/tasks', [TaskAdminController::class, 'index'])->name('admin.task');
Route::get('/admin/teacher', [TeacherAdminController::class, 'index'])->name('admin.teacher');
Route::get('/admin/picketTeacher', [PicketTeacherAdminController::class, 'index'])->name('admin.picketTeacher');
Route::get('/admin/recap', [RecapAdminController::class, 'index'])->name('admin.recap');
Route::get('/admin/manageUser', [ManageUserAdminController::class, 'index'])->name('admin.manageUser');

=======
// Route untuk halaman utama admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard');
    Route::get('/tasks', [TaskAdminController::class, 'index'])->name('task');
    Route::get('/teacher', [TeacherAdminController::class, 'index'])->name('teacher');
    Route::get('/recap', [RecapAdminController::class, 'index'])->name('recap');
    Route::get('/manageUser', [ManageUserAdminController::class, 'index'])->name('manageUser');


    Route::get('/picketTeacher', [PicketTeacherAdminController::class, 'index'])->name('picketTeacher.index');
    Route::get('/picketTeacher/create', [PicketTeacherAdminController::class, 'create'])->name('picketTeacher.create');
    Route::post('/picketTeacher', [PicketTeacherAdminController::class, 'store'])->name('picketTeacher.store');
    Route::get('/picketTeacher/{guruPiket}/edit', [PicketTeacherAdminController::class, 'edit'])->name('picketTeacher.edit');
    Route::put('/picketTeacher/{guruPiket}', [PicketTeacherAdminController::class, 'update'])->name('picketTeacher.update');
    Route::delete('/picketTeacher/{guruPiket}', [PicketTeacherAdminController::class, 'destroy'])->name('picketTeacher.destroy');

    });
>>>>>>> 369127baa190518f6d6eb995aba9c0d8c7fd9a49
