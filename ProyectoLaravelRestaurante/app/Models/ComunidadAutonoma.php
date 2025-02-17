<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunidadAutonoma extends Model
{
    use HasFactory;

    protected $table = 'comunidad_autonoma';

    protected $fillable = [
        'nombre_comunidad'
    ];
}