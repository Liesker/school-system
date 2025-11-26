<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresenceController;

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

// Presence routes
Route::get('/presence', [PresenceController::class, 'index'])->name('presence.index');

Route::get('/', [App\Http\Controllers\ClassController::class, 'index'])->name('home');
Route::get('/classrooms', [App\Http\Controllers\ClassController::class, 'index'])->name('classrooms');


require __DIR__.'/auth.php';
    