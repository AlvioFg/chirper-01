<?php

use App\Http\Controllers\ChirperController;
use Illuminate\Support\Facades\Route;

Route::get('/',  [ChirperController::class, 'index']);
Route::post('/chirper', [ChirperController::class, 'store']);
Route::get('/chirper/{chirp}/edit', [ChirperController::class, 'edit']);
Route::put('/chirper/{chirp}', [ChirperController::class, 'update']);
Route::delete('/chirper/{chirp}', [ChirperController::class, 'delete']);
