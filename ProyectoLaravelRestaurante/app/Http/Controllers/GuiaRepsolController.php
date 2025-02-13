<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuiaRepsolController extends Controller
{
    public function index()
    {
        return view('guia-repsol');
    }
}