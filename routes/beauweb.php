<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VakController;

Route::get('/', function () {
    return view('welcome');
});


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