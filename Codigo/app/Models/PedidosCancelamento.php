<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidosCancelamento extends Model
{
    protected $fillable = [
        'pedido_id',
        'pedidos_item_id',
        'data_solicitacao',
        'taxa_cancelamento',
        'unidade',
        'valor_cancelamento',
        'valor_reembolso',
        'data_reembolso',
    
    ];
    
    
    protected $dates = [
        'data_reembolso',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pedidos-cancelamentos/'.$this->getKey());
    }
}
