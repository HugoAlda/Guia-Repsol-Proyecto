<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurante;

class RestauranteController extends Controller
{
    public function index()
    {
        $restaurants = Restaurante::all();
        return view('guia-repsol', compact('restaurants'));
    }
}