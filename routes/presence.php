<?php

use App\Http\Controllers\PresenceController;
use Illuminate\Support\Facades\Route;

// Presence routes
Route::get('/presence', [PresenceController::class, 'index'])->name('presence.index');
Route::get('/presence/create', [PresenceController::class, 'create'])->name('presence.create');
Route::post('/presence', [PresenceController::class, 'store'])->name('presence.store');
Route::get('/presence/{id}/edit', [PresenceController::class, 'edit'])->name('presence.edit');
Route::get('/presence/show/{id}', [PresenceController::class, 'show'])->name('presence.show');
Route::post('/presence/export-absence', [PresenceController::class, 'exportAbsence'])->name('presence.exportAbsence');
Route::delete('/presence/{id}', [PresenceController::class, 'destroy'])->name('presence.destroy');
Route::post('/presence/objection', [PresenceController::class, 'objection'])->name('presence.objection');
