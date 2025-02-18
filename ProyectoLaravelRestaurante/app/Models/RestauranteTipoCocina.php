<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestauranteTipoCocina extends Model
{
    protected $table = 'restaurante_tipococina';
    protected $fillable = [
        'restaurante_id',
        'tipo_cocina_id'
    ];

    // Relación con el modelo Restaurante
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'restaurante_id');
    }

    // Relación con el modelo TipoCocina
    public function tipoCocina()
    {
        return $this->belongsTo(TipoCocina::class, 'tipo_cocina_id');
    }
}