<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestauranteController;

// Ruta para la página de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Ruta para el registro de usuarios
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Ruta para la página de Guía Repsol protegida por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/guia-repsol', [RestauranteController::class, 'index'])->name('guia-repsol');
});

// Ruta para el logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');