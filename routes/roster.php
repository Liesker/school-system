<?php

use App\Http\Controllers\RosterController;
use Illuminate\Support\Facades\Route;

// Roster Routes
Route::get('/rosters', [RosterController::class, 'index'])->name('rosters');
Route::get('/rosters/create', [RosterController::class, 'create'])->name('rosters.create');
Route::post('/rosters', [RosterController::class, 'store'])->name('rosters.store');
Route::get('/rosters/{id}/edit', [RosterController::class, 'edit'])->name('rosters.edit');
Route::post('/rosters/{id}', [RosterController::class, 'update'])->name('rosters.update');
Route::get('/rosters/{id}/delete', [RosterController::class, 'delete'])->name('rosters.delete');
