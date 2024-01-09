<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController; // Import the HomeController class
use App\Http\Controllers\TrackController;

Route::get('/', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/tracks/create', [TrackController::class, 'create'])->name('tracks.create');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('/test', [HomeController::class, 'index']);
