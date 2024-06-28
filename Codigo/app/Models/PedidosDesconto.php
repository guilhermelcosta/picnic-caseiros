<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidosDesconto extends Model
{
    protected $fillable = [
        'pedido_id',
        'pedidos_item_id',
        'desconto',
        'unidade_desconto',
        'valor_desconto',
    
    ];
    
    
    protected $dates = [
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pedidos-descontos/'.$this->getKey());
    }
}
