<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpdrachtController;

Route::prefix('opdracht')->group(function () {

    Route::get('/', [OpdrachtController::class, 'index'])->name('opdracht.index');
    Route::get('/create', [OpdrachtController::class, 'create'])->name('opdracht.create');
    Route::post('/', [OpdrachtController::class, 'store'])->name('opdracht.store');
    Route::get('/table', [OpdrachtController::class, 'table'])->name('opdracht.table');

    Route::get('/{opdracht}', [OpdrachtController::class, 'show'])->name('opdracht.show');
    Route::get('/{opdracht}/edit', [OpdrachtController::class, 'edit'])->name('opdracht.edit');
    Route::put('/{opdracht}', [OpdrachtController::class, 'update'])->name('opdracht.update');
    Route::delete('/{opdracht}', [OpdrachtController::class, 'destroy'])->name('opdracht.destroy');
});