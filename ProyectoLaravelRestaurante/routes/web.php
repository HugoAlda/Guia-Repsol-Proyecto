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

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación (solo para usuarios autenticados)

// Ruta para el panel de administración
Route::get('/admin', [AdminController::class, 'index'])->name('admin');

// Ruta para el logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/resena', [ResenaController::class, 'index'])->name('resena');