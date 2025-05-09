<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;

Route::middleware(['throttle:web'])->group(function () {
    Route::get('/', [PetController::class, 'index'])->name('pets.index');

    Route::get('/show/{id}', [PetController::class, 'show'])->name('pets.show');
});
