<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobranca extends Model
{
    protected $table = 'cobranca';
    protected $fillable = [
        'tipo',
        'valor',
        'multa',
        'status', 
        'contrato_id'       
    ];
    //$table->int('cliente_id');      
    //$table->int('contrato_id');    
}
