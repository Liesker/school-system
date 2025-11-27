<?php

use App\Http\Controllers\CijferController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresenceController;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [CijferController::class, 'index'])->name('cijfers.index');
Route::get('/cijfers/create', [CijferController::class, 'create'])->name('cijfers.create');
Route::get('/cijfers/{cijfer}', [CijferController::class, 'show'])->name('cijfers.show');
Route::get('/cijfers/{cijfer}/edit', [CijferController::class, 'edit'])->name('cijfers.edit');
Route::put('/cijfers/{cijfer}', [CijferController::class, 'update'])->name('cijfers.update');
Route::get('/cijfers/create', [CijferController::class, 'create'])->name('cijfers.create');

Route::post('/cijfers', [CijferController::class, 'store'])->name('cijfers.store');
Route::delete('/cijfers/{cijfer}', [CijferController::class, 'destroy'])->name('cijfers.destroy');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Presence routes
Route::get('/presence', [PresenceController::class, 'index'])->name('presence.index');


Route::get('/classrooms', [App\Http\Controllers\ClassController::class, 'index'])->name('classrooms');
// Show create form before parameterized routes so "create" isn't treated as an {id}
Route::get('/classrooms/create', [App\Http\Controllers\ClassController::class, 'create'])->name('classrooms.create');

// Store new classroom
Route::post('/classrooms', [App\Http\Controllers\ClassController::class, 'store'])->name('classrooms.store');

Route::get('/classrooms/{id}', [App\Http\Controllers\ClassController::class, 'show'])->name('classrooms.show');
Route::get('/classrooms/{id}/edit', [App\Http\Controllers\ClassController::class, 'edit'])->name('classrooms.edit');
Route::get('/classrooms/{id}/delete', [App\Http\Controllers\ClassController::class, 'delete'])->name('classrooms.delete');


Route::post('/classrooms/{id}', [App\Http\Controllers\ClassController::class, 'update'])->name('classrooms.update');

require __DIR__ . '/auth.php';
