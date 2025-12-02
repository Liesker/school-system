<?php

use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;

Route::prefix('module')->group(function () {

    Route::get('/', [ModuleController::class, 'index'])->name('module.index');
    Route::get('/create', [ModuleController::class, 'create'])->name('module.create');
    Route::post('/', [ModuleController::class, 'store'])->name('module.store');
    Route::get('/table', [ModuleController::class, 'table'])->name('module.table');
    
    Route::get('/{module}', [ModuleController::class, 'show'])->name('module.show');
    Route::get('/{module}/edit', [ModuleController::class, 'edit'])->name('module.edit');
    Route::put('/{module}', [ModuleController::class, 'update'])->name('module.update');
    Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('module.destroy');
});