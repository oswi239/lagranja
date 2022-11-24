<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable = [

        'total_compra',
        'items',
        'user_id',
        'forma_pago',
        'f_inicio',
        'f_final',

    ];
}