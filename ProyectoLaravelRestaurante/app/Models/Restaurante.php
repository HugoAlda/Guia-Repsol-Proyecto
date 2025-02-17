<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;
use App\Models\Resena;
use App\Models\Favorito;
use App\Models\ComunidadAutonoma;
use App\Models\Provincia;

class Restaurante extends Authenticatable
{

    protected $table = 'restaurantes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_restaurante',
        'ubicacion_restaurante',
        'descripcion_restaurante',
        'horario_restaurante',
        'precio_restaurante',
        'valoracion_media',
        'img_restaurante',
        'nombre_gerente',
        'email_gerente',
        'id_comunidad_autonoma',
        'id_provincia'
    ];

    // Relación con ComunidadAutonoma
    public function comunidadAutonoma()
    {
        return $this->belongsTo(ComunidadAutonoma::class, 'id_comunidad_autonoma');
    }

    // Relación con Provincia
    public function provincia()
    {
        return $this->belongsTo(Provincia::class, 'id_provincia');
    }
}