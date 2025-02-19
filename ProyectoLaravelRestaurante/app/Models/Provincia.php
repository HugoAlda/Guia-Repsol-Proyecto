<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurante;
use App\Models\ComunidadAutonoma;

class Provincia extends Model
{

    protected $table = 'provincia';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_provincia'
    ];

    public function restaurantes()
    {
        return $this->hasMany(Restaurante::class, 'id_provincia');
    }
}