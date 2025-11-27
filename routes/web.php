<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/classrooms', [App\Http\Controllers\ClassController::class, 'index'])->name('classrooms');
Route::get('/classrooms/{id}', [App\Http\Controllers\ClassController::class, 'show'])->name('classrooms.show');
Route::get('/classrooms/{id}/edit', [App\Http\Controllers\ClassController::class, 'edit'])->name('classrooms.edit');
Route::get('/classrooms/{id}/delete', [App\Http\Controllers\ClassController::class, 'delete'])->name('classrooms.delete');

// Handle classroom updates via simple POST (no PATCH)
Route::post('/classrooms/{id}', [App\Http\Controllers\ClassController::class, 'update'])->name('classrooms.update');


require __DIR__ . '/auth.php';
