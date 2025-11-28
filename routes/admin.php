<?php
use App\Http\Controllers\ClassController;
use App\Http\Controllers\RosterController;
use Illuminate\Support\Facades\Route;

// Classroom Routes
Route::get('/classrooms', [ClassController::class, 'index'])->name('classrooms');

Route::get('/classrooms/create', [ClassController::class, 'create'])->name('classrooms.create');
Route::post('/classrooms', [ClassController::class, 'store'])->name('classrooms.store');

Route::get('/classrooms/{id}', [ClassController::class, 'show'])->name('classrooms.show');
Route::get('/classrooms/{id}/edit', [ClassController::class, 'edit'])->name('classrooms.edit');
Route::delete('/classrooms/{id}', [ClassController::class, 'destroy'])->name('classrooms.destroy');



Route::post('/classrooms/{id}', [ClassController::class, 'update'])->name('classrooms.update');

// Roster Routes

Route::get('/rosters', [RosterController::class, 'index'])->name('rosters');

Route::get('/rosters/create', [RosterController::class, 'create'])->name('rosters.create');
Route::post('/rosters', [RosterController::class, 'store'])->name('rosters.store');
Route::get('/rosters/{id}/edit', [RosterController::class, 'edit'])->name('rosters.edit');
Route::post('/rosters/{id}', [RosterController::class, 'update'])->name('rosters.update');
Route::get('/rosters/{id}/delete', [RosterController::class, 'delete'])->name('rosters.delete');
