<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrackController;
use App\Http\Controllers\ApiKeysController;
use App\Http\Controllers\PlaylistController;

Route::get('/', [TrackController::class, 'index'])->name('tracks.index');

Route::middleware([
    'auth:sanctum', config('jetstream.auth_session'), 'verified'
])->group(function () {
    Route::resource('playlists', PlaylistController::class);
    Route::get('api-keys', [ApiKeysController::class, 'index'])->name('api-keys');
    Route::get('api-keys/create', [ApiKeysController::class, 'create'])->name('api-keys.create');
    Route::post('api-keys', [ApiKeysController::class, 'store'])->name('api-keys.store');
    Route::delete('api-keys/{apiKey}', [ApiKeysController::class, 'destroy'])->name('api-keys.destroy');


    Route::middleware(['admin'])->group(function () {
        Route::get('tracks/create', [TrackController::class, 'create'])->name('tracks.create');
        Route::post('tracks', [TrackController::class, 'store'])->name('tracks.store');
        Route::get('tracks/{track}/edit', [TrackController::class, 'edit'])->name('tracks.edit');
        Route::put('tracks/{track}', [TrackController::class, 'update'])->name('tracks.update');
        Route::delete('tracks/{track}', [TrackController::class, 'destroy'])->name('tracks.destroy');
    });
});

Route::get('/test', [HomeController::class, 'index']);
