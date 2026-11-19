<?php

use App\Http\Controllers\ChirperController;
use Illuminate\Support\Facades\Route;

Route::get('/',  [ChirperController::class, 'index']);

Route::view('/register', 'auth.register')->middleware('guest')
        ->name('register');

Route::post('/register', \App\Http\Controllers\Auth\Register::class)
    ->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::post('/chirper', [ChirperController::class, 'store']);
    Route::get('/chirper/{chirp}/edit', [ChirperController::class, 'edit']);
    Route::put('/chirper/{chirp}', [ChirperController::class, 'update']);
    Route::delete('/chirper/{chirp}', [ChirperController::class, 'delete']);
});
