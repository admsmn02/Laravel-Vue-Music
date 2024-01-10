<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController; // Import the HomeController class
use App\Http\Controllers\TrackController;

Route::get('/', [TrackController::class, 'index'])->name('tracks.index');
Route::get('/tracks/create', [TrackController::class, 'create'])->name('tracks.create');
Route::post('/tracks', [TrackController::class, 'store'])->name('tracks.store');
Route::get('/tracks/{track}/edit', [TrackController::class, 'edit'])->name('tracks.edit');
Route::put('/tracks/{track}', [TrackController::class, 'update'])->name('tracks.update');
Route::delete('/tracks/{track}', [TrackController::class, 'destroy'])->name('tracks.destroy');


Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified',
])->group(function () {
    Route::get('tracks/create', [TrackController::class, 'create'])->name('tracks.create');
    Route::post('tracks', [TrackController::class, 'store'])->name('tracks.store');
    Route::get('tracks/{track}/edit', [TrackController::class, 'edit'])->name('tracks.edit');
    Route::put('tracks/{track}', [TrackController::class, 'update'])->name('tracks.update');
    Route::delete('tracks/{track}', [TrackController::class, 'destroy'])->name('tracks.destroy');
});

Route::get('/test', [HomeController::class, 'index']);
