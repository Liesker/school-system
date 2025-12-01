<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VakController;
use App\Http\Controllers\ModuleController;

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