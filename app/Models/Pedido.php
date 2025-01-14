<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'valor_total',
        'valor_frete',
        'status',
        'user_id',
    ];   

    public function user()
    {
        return $this->belongsTo(User::class);
    }   
    
    public function produtos()
    {
        return $this->hasMany(ProdutoPedido::class);
    }    
}
