<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ciudad_origen',
        'ciudad_destino',
        'fecha_salida',
        'fecha_retorno',
        'precio',
        'aerolinea',
        'numero_escalas',
        'duracion'
    ];
}
