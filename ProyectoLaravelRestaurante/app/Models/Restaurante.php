<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;

    protected $table = 'restaurantes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre_restaurante',
        'ubicacion_restaurante',
        'descripcion_restaurante',
        'horario_restaurante',
        'precio_restaurante',
        'valoracion_media',
        'nombre_gerente',
        'email_gerente',
    ];

    public function resenas()
    {
        return $this->hasMany(Resena::class, 'id_restaurantes');
    }

    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'id_restaurantes');
    }

    public function tipoCocinas()
    {
        return $this->hasMany(TipoCocina::class, 'id_restaurantes');
    }
}