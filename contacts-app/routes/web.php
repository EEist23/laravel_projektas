<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('students/generate-pdf', [PdfController::class, 'generatePDF']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('students/trashed', [StudentsController::class, 'trashed'])->name('students.trashed');
    Route::post('students/{id}/restore', [StudentsController::class, 'restore'])->name('students.restore');
    Route::delete('students/{id}/forceDelete', [StudentsController::class, 'forceDelete'])->name('students.forceDelete');
    Route::resource('students', StudentsController::class)->except(['index', 'show']);
});

Route::get('students', [StudentsController::class, 'index'])->name('students.index');

require __DIR__.'/auth.php';
