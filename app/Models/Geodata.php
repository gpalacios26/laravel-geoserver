<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geodata extends Model
{
    use HasFactory;

    protected $table = 'geodata';

    protected $fillable = [
        'capa',
        'codigo',
        'nombre',
        'latitud',
        'longitud',
        'direccion',
    ];
}
