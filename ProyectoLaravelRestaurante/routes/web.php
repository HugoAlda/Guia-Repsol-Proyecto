<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuiaRepsolController;

// Ruta para la página principal del Guía Repsol
Route::get('/guia-repsol', [GuiaRepsolController::class, 'index']);
Route::get('/login', [GuiaRepsolController::class, 'login']);