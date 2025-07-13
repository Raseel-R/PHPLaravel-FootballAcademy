<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;

Route::get('/', [PlayerController::class, 'index'])->name('players.index');
Route::post('/players', [PlayerController::class, 'store'])->name('players.store');
Route::put('/players/{player}', [PlayerController::class, 'update'])->name('players.update');
Route::delete('/players/{player}', [PlayerController::class, 'destroy'])->name('players.destroy');

Route::get('/AboutUs', [PlayerController::class, 'AboutUs'])->name('AboutUs');
Route::get('/ContactUs', [PlayerController::class, 'ContactUs'])->name('ContactUs');
