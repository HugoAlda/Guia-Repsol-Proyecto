<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurante;
use App\Models\ComunidadAutonoma;

class Provincia extends Model
{

    protected $table = 'provincias';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_provincia',
        'comunidad_autonoma_id',
    ];

    public function restaurantes()
    {
        return $this->hasMany(Restaurante::class, 'provincia_id');
    }

    public function comunidadAutonoma()
    {
        return $this->belongsTo(ComunidadAutonoma::class, 'comunidad_autonoma_id');
    }
}