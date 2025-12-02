<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CijferController;

Route::get('/cijfers', [CijferController::class, 'index'])->name('cijfers.index');
Route::get('/cijfers/create', [CijferController::class, 'create'])->name('cijfers.create');
Route::get('/cijfers/{cijfer}', [CijferController::class, 'show'])->name('cijfers.show');
Route::get('/cijfers/{cijfer}/edit', [CijferController::class, 'edit'])->name('cijfers.edit');
Route::put('/cijfers/{cijfer}', [CijferController::class, 'update'])->name('cijfers.update');
Route::get('/cijfers/create', [CijferController::class, 'create'])->name('cijfers.create');

Route::post('/cijfers', [CijferController::class, 'store'])->name('cijfers.store');
Route::delete('/cijfers/{cijfer}', [CijferController::class, 'destroy'])->name('cijfers.destroy');