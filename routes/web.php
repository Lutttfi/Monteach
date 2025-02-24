<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\TaskAdminController;
use App\Http\Controllers\admin\TeacherAdminController;
use App\Http\Controllers\admin\PicketTeacherAdminController;
use App\Http\Controllers\admin\RecapAdminController;
use App\Http\Controllers\admin\ManageUserAdminController;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/tasks', [TaskAdminController::class, 'index'])->name('admin.task');
Route::get('/admin/teacher', [TeacherAdminController::class, 'index'])->name('admin.teacher');
Route::get('/admin/picketTeacher', [PicketTeacherAdminController::class, 'index'])->name('admin.picketTeacher');
Route::get('/admin/recap', [RecapAdminController::class, 'index'])->name('admin.recap');
Route::get('/admin/manageUser', [ManageUserAdminController::class, 'index'])->name('admin.manageUser');

