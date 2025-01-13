<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $fillable = [
        'tipo',
        'ciclo',
        'descricao',     
    ];

    //$table->int('cliente_id');

}
