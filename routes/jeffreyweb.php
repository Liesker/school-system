<?php
use App\Http\Controllers\PresenceController;

Route::get('/welcome', function () {
    return view('welcome');
});

// Presence routes
Route::get('/presence', [PresenceController::class, 'index'])->name('presence.index');
Route::get('/presence/create', [PresenceController::class, 'create'])->name('presence.create');
Route::post('/presence', [PresenceController::class, 'store'])->name('presence.store');
Route::get('/presence/{id}/edit', [PresenceController::class, 'edit'])->name('presence.edit');
Route::get('/presence/delete/{id}', [PresenceController::class, 'destroy'])->name('presence.destroy');

?>