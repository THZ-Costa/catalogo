<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\StarController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::prefix('movies')->group(function () {
    Route::get('/', [MovieController::class, 'index']);          
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
    Route::get('/{id}', [MovieController::class, 'show']);       
    Route::put('/{id}', [MovieController::class, 'update']);     
    Route::delete('/{id}', [MovieController::class, 'destroy']); 
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
