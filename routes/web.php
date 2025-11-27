<?php

use App\Http\Controllers\CijferController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\PresenceController;
use App\Http\Controllers\VakController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\ClassController::class, 'index'])->name('home');
Route::get('/classrooms', [App\Http\Controllers\ClassController::class, 'index'])->name('classrooms');
// student 3
Route::prefix('vak')->group(function () {


    Route::get('/', [VakController::class, 'index'])->name('vak.index');
    Route::get('/create', [VakController::class, 'create'])->name('vak.create');
    Route::post('/', [VakController::class, 'store'])->name('vak.store');
    Route::get('/table', [VakController::class, 'table'])->name('vak.table');


    Route::get('/{vak}', [VakController::class, 'show'])->name('vak.show');
    Route::get('/{vak}/edit', [VakController::class, 'edit'])->name('vak.edit');
    Route::put('/{vak}', [VakController::class, 'update'])->name('vak.update');
    Route::delete('/{vak}', [VakController::class, 'destroy'])->name('vak.destroy');
});


require __DIR__.'/auth.php';
