<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $fillable = [

        'descripcion',
        'unidad',
        'precio',
        'cantidad',
        'total',
        'tasa_cambio',
        'user_id',
        'compra_id',
        'creado',
    ];
}