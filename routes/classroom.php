<?php

use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [ClassController::class, 'index'])->name('home');
Route::get('/classrooms', [ClassController::class, 'index'])->name('classrooms');

// Show create form before parameterized routes so "create" isn't treated as an {id}
Route::get('/classrooms/create', [ClassController::class, 'create'])->name('classrooms.create');
// Store new classroom
Route::post('/classrooms', [ClassController::class, 'store'])->name('classrooms.store');

Route::get('/classrooms/{id}', [ClassController::class, 'show'])->name('classrooms.show');
Route::get('/classrooms/{id}/edit', [ClassController::class, 'edit'])->name('classrooms.edit');

Route::post('/classrooms/{id}', [ClassController::class, 'update'])->name('classrooms.update');

// Delete classroom (uses HTTP DELETE)
Route::delete('/classrooms/{id}', [ClassController::class, 'destroy'])->name('classrooms.destroy');
