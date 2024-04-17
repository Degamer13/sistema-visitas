<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visita extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'instituto', 'salida', 'descripcion'
    ];
}
