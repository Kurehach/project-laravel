<?php

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

// Route::inertia('/', 'welcome')->name('home');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::inertia('dashboard', 'dashboard')->name('dashboard');
// });

require __DIR__.'/settings.php';

Route::get('/', [StudentController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/about', function () {
    return view('admin.about');
})->name('admin.about');

Route::prefix('admin')
    ->group(function () {
        // STUDENT
        Route::get('/student', [StudentController::class, 'index'])
            ->name('admin.student.index');

        Route::post('/student', [StudentController::class, 'store'])
            ->name('admin.student.store');

        // CLASSROOM
        Route::get('/classroom', [ClassroomController::class, 'index'])
            ->name('admin.classroom.index');
        Route::get('/classroom/create', [ClassroomController::class, 'create'])
            ->name('admin.classroom.create');
        Route::post('/classroom', [ClassroomController::class, 'store'])
            ->name('admin.classroom.store');

        // TEACHER
        Route::get('/teacher', [TeacherController::class, 'index'])
            ->name('admin.teacher.index');
        Route::get('/teacher/create', [TeacherController::class, 'create'])
            ->name('admin.teacher.create');
        Route::post('/teacher', [TeacherController::class, 'store'])
            ->name('admin.teacher.store');

        // SUBJECT
        Route::get('/subject', [SubjectController::class, 'index'])
            ->name('admin.subject.index');
        Route::get('/subject/create', [SubjectController::class, 'create'])
            ->name('admin.subject.create');
        Route::post('/subject', [SubjectController::class, 'store'])
            ->name('admin.subject.store');
    });