<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\AdminController;

// Ruta para mostrar la vista de reseña
Route::get('/resena/{id}', [ResenaController::class, 'show'])->name('resena');

// Ruta para procesar la valoración
Route::post('/resena/valorar', [ResenaController::class, 'valorar'])->name('resena.valorar');

// Otras rutas...

// Ruta para mostrar la vista combinada de login y registro (dentro de la carpeta auth)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar el inicio de sesión
Route::post('/login', [AuthController::class, 'login']);

// Ruta para procesar el registro de usuarios
Route::post('/register', [RegisterController::class, 'store'])->name('register');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación (solo para usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    // Ruta para el panel de administración
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    // Rutas del CRUD de restaurantes
    Route::resource('restaurantes', AdminController::class);
});

// Rutas protegidas por autenticación (solo para usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('/guia-repsol', [RestauranteController::class, 'index'])->name('guia-repsol');
});

// Ruta para el logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/resena/{id}', [ResenaController::class, 'show'])->name('resena');

// Ruta para la página principal de Guía Repsol
Route::get('/guia-repsol', [RestauranteController::class, 'index'])->name('guia-repsol');

// Rutas protegidas por autenticación (solo para usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    // Ruta para el panel de administración
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});

Route::post('/resena/valorar', [ResenaController::class, 'valorar'])->name('resena.valorar');