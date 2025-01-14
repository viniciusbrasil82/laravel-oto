<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor_venda',
        'status',
        'produto_id',
        'pedido_id'
    ];
    
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }   
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }       
    
}
