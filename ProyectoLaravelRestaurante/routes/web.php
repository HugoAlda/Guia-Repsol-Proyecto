<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\AdminController;

// Página de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Página de registro de usuarios
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Ruta para usuarios normales (Guía Repsol)
Route::get('/guia-repsol', [RestauranteController::class, 'index'])->name('guia-repsol');
Route::get('/resena', [ResenaController::class, 'show'])->name('resena');

// Ruta para crear nuevos restaurantes
Route::get('/restaurantes/create', [RestauranteController::class, 'create'])->name('create');

// Ruta para guardar un nuevo restaurante
Route::post('/restaurantes', [RestauranteController::class, 'store'])->name('store');

// Ruta para ver un restaurante
Route::get('/restaurantes', [RestauranteController::class, 'index'])->name('index');

// Rutas de reseñas (descomentadas si las necesitas)
// Route::post('/resena', [ResenaController::class, 'store'])->name('resena.store');
// Route::put('/resena/{id}', [ResenaController::class, 'update'])->name('resena.update');
// Route::delete('/resena/{id}', [ResenaController::class, 'destroy'])->name('resena.destroy');


// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta para el panel de administración
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
