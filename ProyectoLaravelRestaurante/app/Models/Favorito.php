<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $table = 'favoritos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id_users',
        'id_restaurantes',
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