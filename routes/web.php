<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\TeacherSubjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Admin routes
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.users.edit');
        Route::put('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.users.update');
        Route::delete('/admin/users/{user}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

        // Trasy dla zarządzania przedmiotami nauczycieli
        Route::get('/admin/teachers/{teacher}/subjects', [TeacherSubjectController::class, 'edit'])
            ->name('admin.teachers.subjects');
        Route::put('/admin/teachers/{teacher}/subjects', [TeacherSubjectController::class, 'update'])
            ->name('admin.teachers.subjects.update');
    });

    // Teacher routes
    Route::middleware(['role:teacher'])->group(function () {
        Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.dashboard');
        Route::post('/teacher/grades', [TeacherController::class, 'addGrade'])->name('teacher.grades.store');
        Route::get('/teacher/grades/{grade}/edit', [TeacherController::class, 'editGrade'])->name('teacher.grades.edit');
        Route::put('/teacher/grades/{grade}', [TeacherController::class, 'updateGrade'])->name('teacher.grades.update');
    });

    // Student routes
    Route::middleware(['role:student'])->group(function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.dashboard');
        Route::get('/student/grades/{grade}/history', [StudentController::class, 'showGradeHistory'])->name('student.grades.history');
    });

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
