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

// Página de registro de usuarios
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Ruta para usuarios normales (Guía Repsol)
Route::get('/guia-repsol', [RestauranteController::class, 'index'])->name('guia-repsol');
// Route::get('/restaurante/{id}', [RestauranteController::class, 'show'])->name('resena');
Route::get('/resena', [ResenaController::class, 'index'])->name('resena');

// Ruta para crear una nueva reseña
// Route::post('/resena', [ResenaController::class,'store'])->name('resena');

// // Ruta para editar una reseña
// Route::put('/resena/{id}', [ResenaController::class,'update'])->name('resena');

// // Ruta para eliminar una reseña
// Route::delete('/resena/{id}', [ResenaController::class,'destroy'])->name('resena');

// // Ruta para ver una reseña
// Route::get('/resena/{id}', [ResenaController::class,'show'])->name('resena');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación (solo para usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    // Ruta para el panel de administración
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
});

// Ruta para la vista de creación de restaurantes
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create'); // <-- Asegura que esté definida
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

// Ruta para el logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/resena/{id}', [ResenaController::class, 'show'])->name('resena');

// Ruta para la página principal de Guía Repsol
Route::get('/guia-repsol', [RestauranteController::class, 'index'])->name('guia-repsol');
