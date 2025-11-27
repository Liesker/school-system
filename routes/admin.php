<?php
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;


Route::get('/classrooms', [ClassController::class, 'index'])->name('classrooms');

Route::get('/classrooms/create', [ClassController::class, 'create'])->name('classrooms.create');
// Store new classroom
Route::post('/classrooms', [ClassController::class, 'store'])->name('classrooms.store');

Route::get('/classrooms/{id}', [ClassController::class, 'show'])->name('classrooms.show');
Route::get('/classrooms/{id}/edit', [ClassController::class, 'edit'])->name('classrooms.edit');
Route::get('/classrooms/{id}/delete', [ClassController::class, 'delete'])->name('classrooms.delete');


Route::post('/classrooms/{id}', [ClassController::class, 'update'])->name('classrooms.update');