<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\AdminController;

// Ruta para mostrar la vista combinada de login y registro (dentro de la carpeta auth)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el inicio de sesión
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});

// Ruta para la página principal de Guía Repsol
Route::get('/guia-repsol', [RestauranteController::class, 'index'])->name('guia-repsol');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas para reseñas
Route::get('/resena', [ResenaController::class, 'index'])->name('resena');
Route::get('/resena/{id}', [ResenaController::class, 'show'])->name('resena');

// Ruta para procesar el registro de usuarios
Route::post('/register', [RegisterController::class, 'store'])->name('register');