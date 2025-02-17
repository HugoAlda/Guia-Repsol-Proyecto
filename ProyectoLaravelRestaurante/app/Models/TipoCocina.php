<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCocina extends Model
{
    use HasFactory;

    protected $table = 'tipo_cocina';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_tipo',
        'id_restaurantes',
    ];
}