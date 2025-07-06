<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour les événements
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('events', EventController::class);
    
    // Routes pour les invités (imbriquées dans les événements)
    Route::resource('events.guests', GuestController::class);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
