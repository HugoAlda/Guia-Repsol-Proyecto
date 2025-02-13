<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resena extends Model
{
    use HasFactory;

    protected $table = 'resenas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_users',
        'id_restaurantes',
        'comentario',
        'puntuacion',
        'fecha_resena',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'id_restaurantes');
    }
}