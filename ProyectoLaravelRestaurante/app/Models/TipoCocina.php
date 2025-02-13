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

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'id_restaurantes');
    }
}