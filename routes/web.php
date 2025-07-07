<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\TemplateController;
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

// Routes pour les catégories (accessibles à tous)
Route::resource('categories', CategoryController::class);

// Routes pour les templates (accessibles à tous)
Route::resource('templates', TemplateController::class);
Route::get('templates/category/{category}', [TemplateController::class, 'byCategory'])->name('templates.byCategory');
Route::get('templates/{template}/preview', [TemplateController::class, 'preview'])->name('templates.preview');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
