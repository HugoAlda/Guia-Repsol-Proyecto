<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCocina extends Model
{
    use HasFactory;

    protected $table = 'tipo_cocina';

    protected $fillable = [
        'nombre_tipo',
    ];

    // Relación muchos a muchos con Restaurantes
    public function restaurantes()
    {
        return $this->belongsToMany(Restaurante::class, 'restaurante_tipococina', 'tipo_cocina_id', 'restaurante_id');
    }
}