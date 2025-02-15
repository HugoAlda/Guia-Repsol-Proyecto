<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuiaRepsolController;

// Ruta para la página principal del Guía Repsol
use App\Http\Controllers\RestauranteController;

Route::get('/login', [GuiaRepsolController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/guia-repsol', [RestauranteController::class, 'index'])->name('guia-repsol');
});