<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuiaRepsolController;

Route::get('/guia-repsol', [GuiaRepsolController::class, 'index']);
Route::get('/login', [GuiaRepsolController::class, 'login']);