<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\AdminController;

// Ruta para mostrar la vista combinada de login y registro
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Ruta para el registro de usuarios
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Ruta para usuarios normales (Guía Repsol)
Route::get('/guia-repsol', [RestauranteController::class, 'index'])->name('guia-repsol');
Route::get('/resena', [ResenaController::class, 'index'])->name('resena');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación (solo para usuarios autenticados)
Route::middleware(['auth'])->group(function () {
    // Ruta para el panel de administración
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');

    // Ruta para la creación de restaurantes
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');

    // Ruta para la edición de restaurantes
    Route::get('/admin/{restaurante}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{restaurante}', [AdminController::class, 'update'])->name('admin.update');

    // Ruta para eliminar restaurantes
    // Route::delete('/admin/{restaurante}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

});