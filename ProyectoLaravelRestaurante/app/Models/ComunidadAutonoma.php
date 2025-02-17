<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurante;

class ComunidadAutonoma extends Model
{

    protected $table = 'comunidades_autonomas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_comunidad',
    ];

    public function restaurantes()
    {
        return $this->hasMany(Restaurante::class, 'comunidad_autonoma_id');
    }
}