<?php
use App\Http\Controllers\ClassController;
use App\Http\Controllers\RosterController;
use Illuminate\Support\Facades\Route;

// Classroom Routes
Route::get('/classrooms/create', [App\Http\Controllers\ClassController::class, 'create'])->name('classrooms.create');

// Store new classroom
Route::post('/classrooms', [App\Http\Controllers\ClassController::class, 'store'])->name('classrooms.store');

Route::get('/classrooms/{id}', [App\Http\Controllers\ClassController::class, 'show'])->name('classrooms.show');
Route::get('/classrooms/{id}/edit', [App\Http\Controllers\ClassController::class, 'edit'])->name('classrooms.edit');
Route::get('/classrooms/{id}/delete', [App\Http\Controllers\ClassController::class, 'delete'])->name('classrooms.delete');


Route::post('/classrooms/{id}', [App\Http\Controllers\ClassController::class, 'update'])->name('classrooms.update');




// Roster Routes

Route::get('/rosters', [RosterController::class, 'index'])->name('rosters');

Route::get('/rosters/create', [RosterController::class, 'create'])->name('rosters.create');
Route::post('/rosters', [RosterController::class, 'store'])->name('rosters.store');
Route::get('/rosters/{id}/edit', [RosterController::class, 'edit'])->name('rosters.edit');
Route::post('/rosters/{id}', [RosterController::class, 'update'])->name('rosters.update');
Route::get('/rosters/{id}/delete', [RosterController::class, 'delete'])->name('rosters.delete');
