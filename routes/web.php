<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\StarController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::prefix('movies')->group(function () {
    Route::get('/', [MovieController::class, 'index']);          // Listar todos
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');        // Criar novo
    Route::get('/{id}', [MovieController::class, 'show']);       // Buscar por ID
    Route::put('/{id}', [MovieController::class, 'update']);     // Atualizar
    Route::delete('/{id}', [MovieController::class, 'destroy']); // Remover (soft delete)
});

Route::prefix('stars')->group(function () {
    Route::get('/', [StarController::class, 'index']);        
    Route::post('/', [StarController::class, 'store']);       
    Route::get('/{id}', [StarController::class, 'show']);     
    Route::put('/{id}', [StarController::class, 'update']);   
    Route::delete('/{id}', [StarController::class, 'destroy']);
});

Route::prefix('tags')->group(function () {
    Route::get('/', [TagController::class, 'index']);        
    Route::post('/', [TagController::class, 'store']);       
    Route::get('/{id}', [TagController::class, 'show']);     
    Route::put('/{id}', [TagController::class, 'update']);   
    Route::delete('/{id}', [TagController::class, 'destroy']); 
});

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
